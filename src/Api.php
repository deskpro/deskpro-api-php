<?php

namespace DeskPRO;

/**
 * The API class.
 * Parent class for all other API classes
 * 
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class Api
{
    /** @var \DeskPRO\Api\Dp */
	protected $_interface;
	
	/** @var \DeskPRO\Service\People The people service */
	public $people;
    
	/** @var \DeskPRO\Service\Organization The organization service */
	public $organization;
	
    /** @var \DeskPRO\Service\Tasks The tasks service */
	public $tasks;
    
    /** @var \DeskPRO\Service\Articles The articles service */
	public $articles;
	
    /**
     * The default constructor
     * 
     * @param type $dp_root
     * @param type $api_key
     * @param type $agent_id
     * @param type $api_token
     */
	public function __construct($dp_root, $api_key = null, $agent_id = 0, $api_token = null) {
		$this->_interface   = new Api\Dp($dp_root, $api_key, $agent_id, $api_token);
		
		$this->people       = new Service\People($this->_interface);
        
        $this->organization = new Service\Organization($this->_interface);
        
        $this->tasks        = new Service\Tasks($this->_interface);
        
        $this->articles     = new Service\Articles($this->_interface);
	}

    public function getErrors()
    {
        return $this->_interface->getLastErrors();
    }
}
