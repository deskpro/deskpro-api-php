<?php

namespace DeskPRO\Api;

/**
 * Represents the HTTP call results from a DeskPRO API call.
 */
class Result
{
    protected static $_http_status_messages = array(
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',

        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',

        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',  // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        // 306 is deprecated but reserved
        307 => 'Temporary Redirect',

        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',

        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        509 => 'Bandwidth Limit Exceeded'
    );

    /**
     * HTTP response code
     *
     * @var int
     */
    protected $_code = 200;

    /**
     * List of headers. As headers may be repeated, in form array(array([name], [value]),...).
     *
     * @var array
     */
    protected $_headers = array();

    /**
     * Result body
     *
     * @var string
     */
    protected $_body;

    /**
     * JSON version of the body (if a conversion is possible)
     *
     * @var mixed
     */
    protected $_json = null;

    /**
     * @param string $headers Raw HTTP headers
     * @param string $body
     */
    public function __construct($headers, $body)
    {
        $this->_parseHeaders($headers);
        $this->_body = $body;
    }

    /**
     * Check if the response is an error response (4xx or 5xx).
     *
     * @return bool
     */
    public function isError()
    {
        return $this->_code >= 400;
    }

    /**
     * Parses the headers and HTTP response code (assumed to be first line).
     *
     * @param string $headers
     */
    protected function _parseHeaders($headers)
    {
        $lines = explode("\r\n", $headers);
        $first = array_shift($lines);

        if (preg_match('/^HTTP\/1\.\d (\d{3})/', $first, $match)) {
            $this->_code = intval($match[1]);
        }

        foreach ($lines AS $line) {
            $parts = explode(':', $line, 2);
            if (isset($parts[1])) {
                $this->_headers[] = array(trim(strtolower($parts[0])), trim($parts[1]));
            }
        }
    }

    /**
     * Gets the JSON body results. Returns false if the JSON could not be decoded.
     *
     * @return mixed
     */
    public function getJson()
    {
        if ($this->_json === null) {
            $this->_json = json_decode($this->_body, true);
            if ($this->_json === null) {
                $this->_json = false;
            }
        }

        return $this->_json;
    }

    /**
     * Gets the returned Data
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->getJson();
    }

    /**
     * Gets the raw string body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->_body;
    }

    /**
     * Sets the body results.
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->_body = $body;
        $this->_json = null;
    }

    /**
     * Gets the HTTP response code.
     *
     * @return int
     */
    public function getResponseCode()
    {
        return $this->_code;
    }

    /**
     * Gets the HTTP response code as text. For example, a 404 will return "Not Found".
     *
     * @return string
     */
    public function getResponseCodeAsText()
    {
        return isset(self::$_http_status_messages[$this->_code]) ? self::$_http_status_messages[$this->_code] : '';
    }

    /**
     * Gets the headers. If no name is specified, returns all headers.
     * If a name is given, gets the values for each header with that name.
     *
     * @param string|null $name
     *
     * @return array
     */
    public function getHeaders($name = null)
    {
        if ($name === null) {
            return $this->_headers;
        }

        $output = array();
        $name = strtolower($name);

        foreach ($this->_headers AS $header) {
            if ($header[0] == $name) {
                $output[] = $header[1];
            }
        }

        return $output;
    }

}