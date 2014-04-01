<?php

namespace DeskPRO\Service;

/**
 * The Abstract Service Class
 * Handles common API operations
 *
 * @link https://support.deskpro.com/kb/articles/90-people Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class AbstractService
{

	/** @var \DeskPRO\Api */
	protected $interface;

	/**
	 * Default constructor
	 * 
	 * @param \DeskPRO\Api $interface
	 */
	public function __construct(\DeskPRO\Api $interface)
	{
		$this->interface = $interface;
	}

	/**
	 * Gets the last errors
	 * 
	 * @return array
	 */
	public function getErrors()
	{
		return $this->interface->getLastErrors();
	}

	/**
	 * Calls an API method
	 *
	 * @param string $method Request method (GET, POST, PUT, DELETE)
	 * @param string $end URL to the end point (eg, /tickets), relative to DP root
	 * @param array $params List of parameters to pass to method
	 *
	 * @throws Exception
	 *
	 * @return DpApiResult
	 */
	public function call($method, $end, array $params = array())
	{
		return $this->interface->call($method, $end, $params);
	}

	/**
	 * Ensures that the input is a file upload. If it's a string,
	 * it is assumed to be a local file.
	 *
	 * @param mixed $input
	 *
	 * @return DpApiFileUpload
	 *
	 * @throws DpApiException
	 */
	protected function _enforceFileUpload($input)
	{
		if ($input instanceof DpApiFileUpload) {
			return $input;
		} else if (is_scalar($input)) {
			return new DpApiFileUpload($input);
		} else {
			throw new DpApiException('Cannot force an input to a file (expected string or DpApiFileUpload object)');
		}
	}

	/**
	 * Ensures that a particular parameter is a file upload, if it is set.
	 *
	 * @param array $params
	 * @param string $key
	 * @param bool $multiple
	 *
	 * @return array
	 *
	 * @throws DpApiException
	 */
	protected function _enforceFileUploadIsset(array $params, $key, $multiple = false)
	{
		if (!isset($params[$key])) {
			return $params;
		}

		if (is_array($params[$key])) {
			if ($multiple) {
				foreach ($params[$key] AS &$value) {
					$value = $this->_enforceFileUpload($value);
				}
			} else {
				throw new DpApiException("Passed multiple files to $key when only one was expected");
			}
		} else {
			$params[$key] = $this->_enforceFileUpload($params[$key]);
		}

		return $params;
	}

}
