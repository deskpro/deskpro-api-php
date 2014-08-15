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
