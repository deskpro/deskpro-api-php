<?php

namespace DeskPRO\Api;

/**
 * Represents the HTTP call results from a DeskPRO API call.
 */
class Result
{

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