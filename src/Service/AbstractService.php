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

}
