<?php

namespace DeskPRO\Service;

/**
 * The Organization API
 * Handles organization related operations
 *
 * @link https://support.deskpro.com/kb/articles/90-people Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class Organization extends AbstractApi
{
    /**
	 * Creates and returns a search criteria
	 * 
	 * @return \DeskPRO\Criteria\Organization
	 */
	public function createCriteria() 
	{
		return new \DeskPRO\Criteria\Organization();
	}
    
    public function createOrganizationEditor()
    {
        return new \DeskPRO\Builder\Organization();
    }

    /**
	 * Search for organization matching criteria
	 * 
	 * @param \DeskPRO\Criteria $criteria
	 * @return \DpApiResult Result Object
	 */
	public function find(\DeskPRO\Criteria $criteria)
	{	
		return $this->interface->findOrganizations($criteria->toArray());
	}
    
    /**
     * Gets an Organization by organization ID
     * 
     * @param int $organizationId
     * @return \DpApiResult Result Object
     */
    public function findById($organizationId)
    {
        return $this->interface->getOrganization($organizationId);
    }

    /**
     * Saves an Organization
     * 
     * @param \DeskPRO\Builder\Organization $organization
     * @return \DpApiResult Result Object
     */
    public function save(\DeskPRO\Builder\Organization $organization) 
    {
        if ($organization->getId()) {
            return $this->interface->updateOrganization($organization->getId(), $organization->getDataArray());
        }
        
        return $this->interface->createOrganization($organization->getDataArray());
    }
    
    /**
     * Deletes an Organization by ID
     * 
     * @param int $organizationId Organization ID
     * @return \DpApiResult
     */
    public function deleteById($organizationId)
    {
        return $this->interface->deleteOrganization($organizationId);
    }
    
    /**
     * Gets a link to an organization's picture
     * 
     * @param int $organizationId Organization ID
     * @return \DpApiResult
     */
    public function getOrganizationPicture($organizationId)
    {
        return $this->interface->getOrganizationPicture($organizationId);
    }
    
    /**
     * Sets the Organization's picture
     * 
     * @param int $organizationId Organization ID
     * @param \DpApiFileUpload|string|null $file File to upload
     * @param int|null $blob_id Existing attachment ID (blob ID), possibly from uploadFile()
     * @return \DpApiRes
     */
    public function setOrganizationPicture($organizationId, $file = null, $blob_id = null)
    {
        return $this->interface->setOrganizationPicture($organizationId, $file, $blob_id);
    }
    
    /**
     * Deletes an Organization picture
     * 
     * @param int $organizationId Organization ID
     * @return \DpApiResult
     */
    public function deleteOrganizationPicture($organizationId)
    {
        return $this->interface->deleteOrganizationPicture($organizationId);
    }
    
    /**
     * Gets all SLAs for an organization.
     * 
     * @param int $organizationId Organization ID
     * @return \DpApiResult
     */
    public function getOrganizationSlas($organizationId) 
    {
        return $this->interface->getOrganizationSlas($organizationId);
    }
    
    /**
	 * Adds an SLA for an organization.
	 *
	 * @param int $organizationId Organization ID
	 * @param int $slaId SLA ID to add
	 *
	 * @return \DpApiResult
	 */
	public function addOrganizationSla($organizationId, $slaId)
	{
        return $this->interface->addOrganizationSla($organizationId, $slaId);
    }
    
    /**
	 * Determines if an organization has a particular SLA
	 *
	 * @param int $organizationId
	 * @param int $slaId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationSla($organizationId, $slaId)
	{
        return $this->interface->getOrganizationSla($organizationId, $slaId);
    }
    
    /**
	 * Deletes an SLA for an organization.
	 *
	 * @param int $organizationId
	 * @param int $slaId
	 *
	 * @return \DpApiResult
	 */
	public function deleteOrganizationSla($organizationId, $slaId)
	{
        return $this->interface->deleteOrganizationSla($organizationId, $slaId);
    }
    
    /**
	 * Gets all contact details for an organization.
	 *
	 * @param int $organizationId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationContactDetails($organizationId)
	{
        return $this->interface->getOrganizationContactDetails($organizationId);
    }
    
    /**
	 * Determines if a particular contact ID exists for an organization.
	 *
	 * @param int $organizationId
	 * @param int $contactId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationContactDetail($organizationId, $contactId)
	{
        return $this->interface->getOrganizationContactDetail($organizationId, $contactId);
    }
    
    /**
	 * Removes a particular contact detail from an organization.
	 *
	 * @param int $organizationId
	 * @param int $contactId
	 *
	 * @return \DpApiResult
	 */
	public function removeOrganizationContactDetail($organizationId, $contactId)
	{
        return $this->interface->removeOrganizationContactDetail($organizationId, $contactId);
    }
    
    /**
	 * Gets the list of groups that the organization belongs to.
	 *
	 * @param integer $organizationId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationGroups($organizationId)
	{
        return $this->interface->getOrganizationGroups($organizationId);
    }
    
    /**
	 * Adds an organization to a group
	 *
	 * @param integer $organizationId
	 * @param integer $groupId
	 *
	 * @return \DpApiResult
	 */
	public function addOrganizationGroup($organizationId, $groupId)
	{
        return $this->interface->addOrganizationGroup($organizationId, $groupId);
    }
    
    /**
	 * Determines if the an organization is a member of a particular group.
	 *
	 * @param integer $organizationId
	 * @param integer $groupId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationGroup($organizationId, $groupId)
	{
        return $this->interface->getOrganizationGroup($organizationId, $groupId);
    }
    
    /**
	 * Removes an organization from a group.
	 *
	 * @param integer $organizationId
	 * @param integer $groupId
	 *
	 * @return \DpApiResult
	 */
	public function removeOrganizationGroup($organizationId, $groupId)
	{
        return $this->removeOrganizationGroup($organizationId, $groupId);
    }
    
    /**
	 * Gets all labels associated with an organization.
	 *
	 * @param integer $organizationId
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationLabels($organizationId)
	{
        return $this->interface->getOrganizationLabels($organizationId);
    }
    
    /**
	 * Adds a label to an organization.
	 *
	 * @param integer $organizationId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function addOrganizationLabel($organizationId, $label)
	{
        return $this->interface->addOrganizationLabel($organizationId, $label);
    }
    
    /**
	 * Determines if an organization has a specific label.
	 *
	 * @param integer $organizationId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationLabel($organizationId, $label)
	{
        return $this->interface->getOrganizationLabel($organizationId, $label);
    }
    
    /**
	 * Removes a label from an organization.
	 *
	 * @param int $organizationId Organization ID
	 * @param string $label label to remove
	 *
	 * @return \DpApiResult
	 */
	public function removeOrganizationLabel($organizationId, $label)
	{
        return $this->interface->removeOrganizationLabel($organizationId, $label);
    }
    
    /**
	 * Gets a list of custom organizations fields.
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationsFields()
	{
        return $this->interface->getOrganizationsFields();
    }
    
    /**
	 * Gets a list of available user groups.
	 *
	 * @return \DpApiResult
	 */
	public function getOrganizationsGroups()
	{
        return $this->getOrganizationsGroups();
    }
}