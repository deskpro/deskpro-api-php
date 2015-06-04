Search for organizations matching criteria
-----------------------------------

    $criteria = $api->organization->createCriteria();

    $criteria->addName('deskpro ltd')
            ->addAddress('address goes here')
            ->addCustomField('custom field key', 'custom field value');

    $result = $api->organization->find($criteria);

Create a new organization
-----------------------------------

    $newUser = $api->organization->createOrganizationEditor();

    $newUser->setName('DeskPRO Ltd')
        ->addCustomField('custom field key', 'custom field value')
        ->addToGroup($groupId)
        ->setSummary('Summary text goes here');

    $result = $api->organization->save($newUser);

Get information about an organization
-----------------------------------

    $result = $api->organization->findById($organizationId);

Updates an organization
-----------------------------------

    $edituser = $api->organization->createPersonEditor()
        ->setId($organizationId)
        ->setName("New Name of the Organization");

    $result = $api->organization->save($edituser);

Deletes an organization
-----------------------------------

    $result = $api->organization->deleteById(15);

Reset an organization's password
-----------------------------------

    $edituser = $api->organization->createPersonEditor()
        ->setId($organizationId)
        ->setPassword("newpassword")
        ->sendMail();

    $result = $api->organization->save($edituser);

Get a link to an organization's profile picture
----------------------------------------

    $result = $api->organization->getPicture($organizationId);

Updates an organization's profile picture
----------------------------------

    $result = $api->organization->setPicture($organizationId, '/path/to/image.jpg');

Deletes an organization's profile picture
----------------------------------

    $result = $api->organization->deletePicture($organizationId);

Gets all SLAs for an organization.
----------------------------------

    $result = $api->organization->getSlas($organizationId);

Adds an SLA for an organization.
----------------------------------

    $result = $api->organization->addSla($organizationId, $slaId);

Determines if an organization has a particular SLA
----------------------------------

    $result = $api->organization->getSla($organizationId, $slaId);

Deletes an SLA for an organization.
----------------------------------

    $result = $api->organization->deleteSla($organizationId, $slaId);

Gets all contact details for an organization.
----------------------------------

    $result = $api->organization->getContactDetails($organizationId);

Determines if a particular contact ID exists for an organization.
----------------------------------

    $result = $api->organization->getContactDetail($organizationId, $contactId);

Removes a particular contact detail from an organization.
----------------------------------

    $result = $api->organization->removeContactDetail($organizationId, $contactId);

Gets the list of groups that the organization belongs to.
----------------------------------

    $result = $api->organization->getGroupsByOrganization($organizationId);

Adds an organization to a group.
----------------------------------

    $result = $api->organization->addGroup($organizationId, $groupId);

Determines if the an organization is a member of a particular group.
----------------------------------

    $result = $api->organization->getGroup($organizationId, $groupId);

Removes an organization from a group.
----------------------------------

    $result = $api->organization->removeGroup($organizationId, $groupId);

Gets all labels associated with an organization.
----------------------------------

    $result = $api->organization->getLabels($organizationId);

Adds a label to an organization.
----------------------------------

    $result = $api->organization->addLabel($organizationId, $label);

Determines if an organization has a specific label.
----------------------------------

    $result = $api->organization->getLabel($organizationId, $label);

Removes a label from an organization.
----------------------------------

    $result = $api->organization->removeLabel($organizationId, $label);

Gets a list of custom organizations fields.
----------------------------------

    $result = $api->organization->getFields();

Gets a list of available user groups.
----------------------------------

    $result = $api->organization->getGroups();

Gets members of an organization.
----------------------------------
    $page = 2; // Page number of the result set
    $order = 'person.name:desc'; //Defaults to person.name:asc.
    $cacheId = '13579'; // the ID of the cache set to use to retrieve cached results

    $result = $api->organization->getMembers($organizationId, $page, $order, $cacheId);

Gets tickets for an organization.
----------------------------------
    $page = 2; // Page number of the result set
    $order = 'ticket.date_created:asc'; //Defaults to ticket.date_created:desc.
    $cacheId = '13579'; // the ID of the cache set to use to retrieve cached results

    $result = $api->organization->getOrganizationTickets($organizationId, $page, $order, $cacheId);

Gets chats for an organization.
----------------------------------
    $page = 2; // Page number of the result set
    $order = 'chat_conversations.id:asc'; //Defaults to chat_conversations.id:desc.
    $cacheId = '13579'; // the ID of the cache set to use to retrieve cached results

    $result = $api->organization->getOrganizationChats($organizationId, $page, $order, $cacheId);

Gets activity stream for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->getOrganizationActivityStream($organizationId, $page);

Gets billing charges for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->getOrganizationBillingCharges($organizationId, $page);

Gets email domains for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->getOrganizationEmailDomains($organizationId);

Add email domain for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->addOrganizationEmailDomains($organizationId, $domain);

Determines if email domain exists for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->addOrganizationEmailDomain($organizationId, $domain);

Deletes an email domain for an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->deleteOrganizationEmailDomain($organizationId, $domain);

Moves email domain users for an organization if they have no organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->moveOrganizationEmailDomainUsers($organizationId, $domain);

Moves email domain users for an organization if they have an organization.
----------------------------------
    $page = 2; // Page number of the result set

    $result = $api->organization->moveOrganizationEmailDomainUsers($organizationId, $domain);

