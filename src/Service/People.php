<?php

namespace DeskPRO\Service;

/**
 * The People API
 * Handles people related operations
 * 
 * @link https://support.deskpro.com/kb/articles/90-people Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class People extends AbstractService
{
    /**
     * Deletes a Person by ID
     *
     * @param int $id ID of the Person to delete
     * @return \DpApiResult
     */
    public function deleteById($id)
    {
        return $this->interface->deletePerson($id);
    }
	
	/**
	 * Finds a Person by ID
	 * 
	 * @param int $id Person's ID to search
	 * @return \DeskPRO\Person
	 */
	public function findById($id)
	{
		return $this->interface->getPerson($id);
		
		if ($payload) {
			return $this->createFromArray($payload['person']);
		}
	}
	
	/**
	 * Creates a Person object from a payload array
	 * 
	 * @param array $payload The payload/value array
	 * @return \DeskPRO\Person
	 * @throws \Exception if the $payload does not have a valid ID
	 */
	public function createFromArray(array $payload)
	{
        return $payload;
//		if (!isset($payload['id'])) {
//			throw new \Exception("Invalid Payload");
//		}
		
		return new \DeskPRO\Person($payload);
	}
	
	/**
	 * Search for people matching criteria
	 * 
	 * @param \DeskPRO\Criteria $criteria
	 * @return \DpApiResult Result Object
	 */
	public function find(\DeskPRO\Criteria $criteria)
	{
//		$persons = array();
		
		return $this->interface->findPeople($criteria->toArray());
		
		if ($payload) {	
			foreach ($payload['people'] as $people) {
				$persons[] = $this->createFromArray($people);
			}
		}
		
		return $persons;
	}
	
	/**
	 * Creates and returns a search criteria
	 * 
	 * @return \DeskPRO\Criteria\People
	 */
	public function createCriteria() 
	{
		return new \DeskPRO\Criteria\People();
	}

    public function createPerson()
    {
        return new \DeskPRO\Person(array());
    }


	/**
	 * Saves a Person
	 * 
	 * @param \DeskPRO\Builder\Person $person
	 * @return \DpApiResult
     * @throws \Exception if required parameters are missing
	 */
    public function save(\DeskPRO\Builder\Person $person)
	{
        if (!$person->getEmail() || !$person->getName('full')) {
            //throw new \Exception("Required fields 'email' and 'name' are missing");
        }

        if (!$person->getId()) {
            $response = $this->interface->createPerson($person->getDataArray());
        } else {
            $response = $this->interface->updatePerson($person->getId(), $person->getDataArray());
        }

        return $response;
	}


    /**
     * Clears all active sessions for a person
     *
     * @param int $personId The person's ID
     * @return DpApiResult
     */
    public function clearPersonSessions($personId)
    {
        return $this->interface->call('POST', '/people/' . $personId . '/clear-session');
    }

    /**
     * Gets a list of automatically applied SLAs for a person
     *
     * @param int $personId The Person's ID
     * @return DpApiResult
     */
    public function getPersonSlas($personId)
    {
        return $this->interface->getPersonSlas($personId);
    }

    /**
     * Adds an SLA for a person.
     *
     * @param int $personId The Person's ID
     * @param int $slaId The SLA ID
     * @return DpApiResult
     */
    public function addPersonSla($personId, $slaId)
    {
        return $this->interface->addPersonSla($personId,$slaId);
    }

    /**
     * Determines if a person has a particular SLA
     *
     * @param int $personId
     * @param int $slaId
     *
     * @return DpApiResult
     */
    public function getPersonSla($personId, $slaId)
    {
        return $this->interface->getPersonSla($personId, $slaId);
    }

    /**
     * Deletes a particular SLA for a person.
     *
     * @param int $personId The Person's ID
     * @param int $slaId The SLA ID
     *
     * @return DpApiResult
     */
    public function deletePersonSla($personId, $slaId)
    {
        return $this->interface->deletePersonSla($personId, $slaId);
    }

    /**
     * Get the picture for a person
     *
     * @param int $personId The Person's ID
     *
     * @return DpApiResult
     */
    public function getPersonPicture($personId)
    {
        return $this->interface->getPersonPicture($personId);
    }

    /**
     * Set the picture of a person
     *
     * @param int $personId The Person's ID
     * @param DpApiFileUpload|string|null $file File to upload
     * @param integer|null $blobId Existing attachment ID (blob ID), possibly from uploadFile()
     *
     * @return DpApiResult
     */
    public function setPersonPicture($personId, $file = null, $blobId = null)
    {
        return $this->interface->setPersonPicture($personId, $file, $blobId);
    }

    /**
     * Delete the picture of a person
     *
     * @param int $personId The Person's ID
     *
     * @return DpApiResult
     */
    public function deletePersonPicture($personId)
    {
        return $this->interface->deletePersonPicture($personId);
    }

    /**
     * Gets all emails for a person.
     *
     * @param int $personId
     *
     * @return DpApiResult
     */
    public function getPersonEmails($personId)
    {
        return $this->interface->getPersonEmails($personId);
    }

    /**
     * Adds an email for a person.
     *
     * @param int $personId
     * @param string $email
     * @param array $params
     *
     * @return DpApiResult
     */
    public function addPersonEmail($personId, $email, array $params = array())
    {
        return $this->interface->addPersonEmail($personId, $email, $params);
    }

    /**
     * Gets information about a particular email ID for a person.
     *
     * @param int $personId
     * @param int $emailId
     *
     * @return DpApiResult
     */
    public function getPersonEmail($personId, $emailId)
    {
        return $this->interface->getPersonEmail($personId, $emailId);
    }

    /**
     * Updates a particular email ID for a person.
     *
     * @param int $personId The Persons's ID
     * @param int $emailId The EmailID to update
     * @param bool $setPrimary Whether to make this the primary email
     * @param string $comment Email comment
     *
     * @return DpApiResult
     */
    public function updatePersonEmail($personId, $emailId, $setPrimary = false, $comment = null)
    {
        return $this->interface->updatePersonEmail($personId, $emailId, array(
            'set_primary'   => $setPrimary,
            'comment'       => $comment
        ));
    }

    /**
     * Deletes a particular email ID for a person.
     *
     * @param int $personId
     * @param int $emailId
     *
     * @return DpApiResult
     */
    public function deletePersonEmail($personId, $emailId)
    {
        return $this->interface->deletePersonEmail($personId, $emailId);
    }

    /**
     * Gets tickets for a person.
     *
     * @param int $personId
     * @param int $page Page number of results to retrieve - defaults to 1
     * @param null|string $order Order of results (if not specified, uses API default)
     * @param null|int $cache_id If specified, uses the cached results from this set if possible.
     *
     * @return DpApiResult
     */
    public function getPersonTickets($personId, $page = 1, $order = null, $cache_id = null)
    {
        return $this->interface->getPersonTickets($personId, $order, $cache_id);
    }

    /**
     * Gets chats for a person.
     *
     * @param int $personId
     * @param int $page Page number of results to retrieve - defaults to 1
     * @param null|string $order Order of results - this is currently not used by the API!
     * @param null|int $cache_id If specified, uses the cached results from this set if possible.
     *
     * @return DpApiResult
     */
    public function getPersonChats($personId, $page = 1, $order = null, $cache_id = null)
    {
        return $this->interface->getPersonChats($personId, $page, $order, $cache_id);
    }

    /**
     * Gets activity stream for a person.
     *
     * @param int $personId
     * @param int $page Page number of results to retrieve - defaults to 1
     *
     * @return DpApiResult
     */
    public function getPersonActivityStream($personId, $page = 1)
    {
        return $this->interface->getPersonActivityStream(1);
    }

    /**
     * Gets notes for a person.
     *
     * @param int $personId
     *
     * @return DpApiResult
     */
    public function getPersonNotes($personId)
    {
        return $this->interface->getPersonNotes($personId);
    }

    /**
     * Creates a note for a person.
     *
     * @param int $personId The Person's ID
     * @param string $note The Note content to add
     *
     * @return DpApiResult
     */
    public function createPersonNote($personId, $note)
    {
        return $this->interface->createPersonNote($personId, $note);
    }

    /**
     * Gets billing charges for a person.
     *
     * @param int $personId
     * @param int $page Page number of results to retrieve - defaults to 1
     *
     * @return DpApiResult
     */
    public function getPersonBillingCharges($personId, $page = 1)
    {
        return $this->interface->getPersonBillingCharges($personId, $page);
    }

    /**
     * Gets all contact details for a person.
     *
     * @param int $personId
     *
     * @return DpApiResult
     */
    public function getPersonContactDetails($personId)
    {
        return $this->interface->getPersonContactDetails($personId);
    }

    /**
     * Adds an address to a Person's contact details
     *
     * @param int $personId The Person's ID
     * @param string $address The address to add
     * @param string $city The city to add
     * @param string $state The state to add
     * @param string $zip The zipcode to add
     * @param string $comment Comments
     * @param string $country Country to add
     * @return DpApiResult
     */
    public function addAddress($personId, $address, $city = null, $state = null, $zip = null, $country = null, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'address', array(
            'address'   => $address,
            'city'      => $city,
            'country'   => $country,
            'state'     => $state,
            'zip'       => $zip
        ), $comment);
    }

    /**
     * Adds a facebook profile to a Person's contact details
     *
     * @param int $personId The Person ID
     * @param string $profileUrl Person's facebook profile URL
     * @param string $comment Comment
     * @return DpApiResult
     */
    public function addFacebook($personId, $profileUrl, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'facebook', array(
            'profile_url'   => $profileUrl
        ), $comment);
    }

    /**
     * Adds an IM contact details to a Person
     *
     * @param int $personId The Person's ID
     * @param string $service IM service to add. E.g. aim
     * @param string $username IM Username
     * @param string $comment Any optional comment
     * @return DpApiResult
     */
    public function addIm($personId, $service, $username, $comment = '')
    {
        return $this->interface->addPersonContactDetail($personId, 'instant_message', array(
            'service'   => $service,
            'username'  => $username
        ), $comment);
    }

    /**
     * Adds a LinkedIn profile to a Person's contact details
     *
     * @param int $personId The Person ID
     * @param string $profileUrl Person's LinkedIn profile URL
     * @param string $comment Comment
     * @return DpApiResult
     */
    public function addLinkedIn($personId, $profileUrl, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'linked_in', array(
            'profile_url'   => $profileUrl
        ), $comment);
    }

    /**
     * Adds a Phone number to a Person's contact details
     *
     * @param int $personId The Person's ID
     * @param int $number The phone number to add
     * @param string $type The type of number. Valid types are phone, mobile, fax
     * @param int $countryCode Country calling code
     * @param string $comment Comment
     * @return DpApiResult
     */
    public function addPhone($personId, $number, $type, $countryCode = null, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'phone', array(
            'number'                => $number,
            'type'                  => $type,
            'country_calling_code'  => $countryCode
        ), $comment);
    }

    /**
     * Adds a Skype account to a Person's contact details
     *
     * @param int $personId Person's ID
     * @param string $username Skype username to add
     * @param string $comment Comment
     * @return DpApiResult
     */
    public function addSkype($personId, $username, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'skype', array(
            'username'  => $username
        ), $comment);
    }

    /**
     * Adds a Twitter account to a Person's contact details
     *
     * @param int $personId Person's ID
     * @param string $username Twitter username to add
     * @param string $comment Comment
     * @return DpApiResult
     */
    public function addTwitter($personId, $username, $comment = null)
    {
        return $this->interface->addPersonContactDetail($personId, 'twitter', array(
            'username'  => $username
        ), $comment);
    }

    /**
     * Adds a website to a Person's contact details
     *
     * @param int $personId The Person's ID
     * @param string $website The website to add
     * @param string $comment Any optional comments
     * @return DpApiResult
     */
    public function addWebsite($personId, $website, $comment = '')
    {
        return $this->interface->addPersonContactDetail($personId, 'website', array(
            'url'   => $website
        ), $comment);
    }

    /**
     * Adds a contact detail for a person.
     *
     * @param int $personId The Person's ID
     * @param string $type Type of contact detail
     * @param array $data Type-specific contact data
     * @param string $comment
     *
     * @return DpApiResult
     */
    public function addPersonContactDetail($personId, $type, array $data, $comment = '')
    {
        return $this->interface->addPersonContactDetail($personId, $type, $data, $comment);
    }

    /**
     * Determines if a particular contact ID exists for a person.
     *
     * @param int $personId The Person's ID
     * @param int $contactId The contact ID to check
     *
     * @return DpResultApi
     */
    public function getPersonContactDetail($personId, $contactId)
    {
        return $this->interface->getPersonContactDetail($personId, $contactId);
    }

    /**
     * Removes a particular contact detail from a person.
     *
     * @param int $personId The Person's ID
     * @param int $contactId The contact ID to remove
     *
     * @return DpResultApi
     */
    public function removePersonContactDetail($personId, $contactId)
    {
        return $this->interface->removePersonContactDetail($personId, $contactId);
    }

    /**
     * Gets the list of groups that the person belongs to.
     *
     * @param int $personId The Person's ID
     *
     * @return DpApiResult
     */
    public function getPersonGroups($personId)
    {
        return $this->interface->getPersonGroups($personId);
    }

    /**
     * Adds a person to a group
     *
     * @param int $personId The Person's ID
     * @param int $groupId The group ID to add the person to
     *
     * @return DpApiResult
     */
    public function addPersonGroup($personId, $groupId)
    {
        return $this->interface->addPersonGroup($personId, $groupId);
    }

    /**
     * Determines if the a person is a member of a particular group.
     *
     * @param int $personId The Person's ID
     * @param int $groupId The group ID to check
     *
     * @return DpApiResult
     */
    public function getPersonGroup($personId, $groupId)
    {
        return $this->interface->getPersonGroup($personId, $groupId);
    }

    /**
     * Removes a person from a group.
     *
     * @param int $personId The Person's ID
     * @param int $groupId The group ID to remove the person from
     *
     * @return DpApiResult
     */
    public function removePersonGroup($personId, $groupId)
    {
        return $this->removePersonGroup($personId, $groupId);
    }

    /**
     * Gets all labels associated with a person.
     *
     * @param int $personId The Person's ID
     *
     * @return array|bool
     */
    public function getPersonLabels($personId)
    {
        return $this->interface->getPersonLabels($personId);
    }

    /**
     * Adds a label to a person.
     *
     * @param int $personId The Person's ID
     * @param string $label The label to add
     *
     * @return DpApiResult
     */
    public function addPersonLabel($personId, $label)
    {
        return $this->interface->addPersonLabel($personId, $label);
    }

    /**
     * Determines if a person has a specific label.
     *
     * @param int $personId The Person's ID
     * @param string $label The label to check
     *
     * @return DpApiResult
     */
    public function getPersonLabel($personId, $label)
    {
        return $this->interface->getPersonLabel($personId, $label);
    }

    /**
     * Removes a label from a person.
     *
     * @param int $personId The Person's ID
     * @param string $label The label to remove
     *
     * @return DpApiResult
     */
    public function removePersonLabel($personId, $label)
    {
        return $this->removePersonLabel($personId, $label);
    }

    /**
     * Gets a list of custom people fields.
     *
     * @return DpApiResult
     */
    public function getPeopleFields()
    {
        return $this->interface->getPeopleFields();
    }

    /**
     * Gets a list of available user groups.
     *
     * @return DpApiResult
     */
    public function getPeopleGroups()
    {
        return $this->interface->getPeopleGroups();
    }

    /**
     * Creates a Person Builder
     *
     * @return \DeskPRO\Builder\Person
     */
    public function createPersonEditor()
    {
        return new \DeskPRO\Builder\Person();
    }
}