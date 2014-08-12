Updates a new Ticket
-----------------------------------

    $ticket = $api->tickets->createBuilder();

    $ticket->setId($ticketId)
            ->setSubject('New Subject of the ticket')
            ->assignToAgent($agentId);

    $result = $api->tickets->save($ticket);

Deletes a ticket and optionally bans the email used to create it
-----------------------------------
    
    $banEmail = TRUE;
    
    $result = $api->tickets->delete($ticketId, $banEmail);

UnDeletes a ticket
-----------------------------------

    $result = $api->tickets->unDelete($ticketId);

Marks a ticket as spam and optionally bans the creator's email
-----------------------------------

    $banEmail = TRUE;

    $result = $api->tickets->markAsSpam($ticketId, $banEmail);

UnMarks a ticket as spam
-----------------------------------

    $result = $api->tickets->unmarkAsSpam($ticketId);

Assigns the ticket to the user making the API request
-----------------------------------

    $result = $api->tickets->assignToMe($ticketId);

Locks a ticket.
-----------------------------------

    $result = $api->tickets->lock($ticketId);

UnLocks a ticket.
-----------------------------------

    $result = $api->tickets->unlock($ticketId);

Merges two tickets.
-----------------------------------
`$target` The ticket that the other will be merged into
`$from` This ticket will be removed on a successful merge

    $result = $api->tickets->merge($target, $from);

Splits 1 or more messages out of a ticket into a new ticket
-----------------------------------
    $ticketId   = 1; // Ticket to split from
    $messageIds = array(3, 5, 7, 9); // Message IDs to split out
    $subject    = 'New Ticket created after split'; // Subject of new ticket

    $result = $api->tickets->splitMessages($ticketId, $messageIds, $subject);

Gets all logs in a ticket.
-----------------------------------

    $result = $api->tickets->getLogs($ticketId);

Gets all messages in a ticket.
-----------------------------------

    $result = $api->tickets->getMessages($ticketId);

Creates a new ticket message in a ticket.
-----------------------------------
    $ticketId           = 1; //Ticket ID where the reply needs to be added
    
    $message            = 'New Message'; // Message reply text.
    
    $files              = array('path/to/file.ext', 'path/to/another/file.ext'); // An array of DpApiFileUpload|string|null to upload with the reply
    $blobIds            = array('2, 4, 6); // An array of already uploaded blob IDs

    $isNote             = FALSE; // If true, sets the reply as a note, rather than a public reply. Defaults to false.

    $asAgent            = FALSE; // If true, the message is considered to be written by the API agent rather than the ticket owner. Defaults to false.
    $isHtml             = FALSE; // If true, the message parameter is treated as HTML.
    $muteNotification   = FALSE; // If true, suppresses user notification of the reply. Defaults to false.

    $result = $api->tickets->createMessage($ticketId, $message, $files, $blobIds, $isNote, $asAgent, $isHtml, $muteNotification);

Gets a ticket message.
-----------------------------------

    $result = $api->tickets->getMessage($ticketId, $messageId);

Gets a ticket message's details.
-----------------------------------

    $result = $api->tickets->getMessageDetails($ticketId, $messageId);

Gets ticket tasks.
-----------------------------------

    $result = $api->tickets->getTasks($ticketId);

Adds a ticket task.
-----------------------------------

    $title = 'Task Title';

    $result = $api->tickets->addTask($ticketId, $title);

Gets the SLAs for a ticket.
-----------------------------------

    $result = $api->tickets->getTicketSlas($ticketId);

Add an SLA to a ticket.
-----------------------------------

    $result = $api->tickets->addTicketSla($ticketId, $slaId);

Checks whether a ticket SLA is associated with the ticket.
-----------------------------------

    $result = $api->tickets->getTicketSla($ticketId, $ticketSlaId);

Deletes a ticket SLA from a ticket.
-----------------------------------

    $result = $api->tickets->removeTicketSla($ticketId, $ticketSlaId);

Gets ticket billing charges.
-----------------------------------

    $result = $api->tickets->getBillingCharges($ticketId);

Adds a ticket billing charge.
-----------------------------------

    $time       = 3600; // Time in seconds to bill. Required if there is no amount.
    $amount     = 60; //  Amount (in admin-specified currency) to bill. Required if there is no time.
    $comment    = 'Billed for XXXXX'; // Comment or reason for the charge.

    $result = $api->tickets->addBillingCharge($ticketId, $time, $amount, $comment);

Returns whether a charge is associated with the ticket.
-----------------------------------

    $result = $api->tickets->getBillingCharge($ticketId, $chargeId);

Removes a billing charge from a ticket.
-----------------------------------

    $result = $api->tickets->deleteBillingCharge($ticketId, $chargeId);

Gets all participants (CC'd users) in a ticket.
-----------------------------------

    $result = $api->tickets->getParticipants($ticketId);

Adds a ticket participant.
-----------------------------------
    $personId   = 9; // ID of the person to add to the ticket
    $email      = 'newemail@domain.com'; // Email address of the person to add to the ticket. If no person can be found with this email, one will be created.

    $result = $api->tickets->addParticipant($ticketId, $personId = null, $email = null);

Returns whether a person is a participant (CC user) in a ticket.
-----------------------------------

    $result = $api->tickets->getParticipant($ticketId, $personId);

Removes a participant from a ticket.
-----------------------------------

    $result = $api->tickets->removeParticipant($ticketId, $personId);

Gets all labels associated with a ticket.
-----------------------------------

    $result = $api->tickets->getTicketLabels($ticketId);

Adds a label to a ticket.
-----------------------------------

    $result = $api->tickets->getTicketLabel($ticketId, 'label text');

Removes a label from a ticket.
-----------------------------------

    $result = $api->tickets->removeTicketLabel($ticketId, $label);

Gets a list of custom ticket fields.
-----------------------------------

    $result = $api->tickets->getFields();

Gets a list of ticket departments.
-----------------------------------

    $result = $api->tickets->getDepartments();

Gets a list of ticket departments.
-----------------------------------

    $result = $api->tickets->getProducts();

Gets a list of ticket categories.
-----------------------------------

    $result = $api->tickets->getCategories();

Gets a list of ticket priorities.
-----------------------------------

    $result = $api->tickets->getPriorities();

Gets a list of ticket workflows.
-----------------------------------

    $result = $api->tickets->getWorkflows();

Gets a list of SLAs.
-----------------------------------

    $result = $api->tickets->getSlas();

Gets an SLA
-----------------------------------

    $result = $api->tickets->getSla($slaId);

Gets people that receive an SLA automatically
-----------------------------------

    $result = $api->tickets->getSlaPeople($slaId);

Gets organizations that receive an SLA automatically
-----------------------------------

    $result = $api->tickets->getSlaOrganizations($slaId);

Gets a list of ticket filters.
-----------------------------------

    $result = $api->tickets->getTicketsFilters();

Runs the specified ticket filter and returns the results.
-----------------------------------

    $result = $api->tickets->runTicketFilter($filterId, $page = 1);
