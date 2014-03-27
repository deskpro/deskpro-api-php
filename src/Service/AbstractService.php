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
    /** @var \DpApi */
    protected $interface;

    public function __construct(\DpApi $interface)
    {
        $this->interface = $interface;
    }

    public function getErrors()
    {
        return $this->interface->getLastErrors();
    }
}