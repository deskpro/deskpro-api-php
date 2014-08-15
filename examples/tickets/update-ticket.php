<?php

/*
 * This example demonstrates how to update an existing ticket
 */

//-----------------------------------------------------
// DESKPRO API SETTINGS
//-----------------------------------------------------

require __DIR__.'/../../deskpro-api.php';

$deskpro_url   = 'http://example.com/deskpro';   // The URL to your helpdesk
$api_key       = '123:XYZ';                      // Your API key (Admin > Apps > API Keys)

// First, create the API object
$api = new \DeskPRO\Api($deskpro_url, $api_key);

//-----------------------------------------------------
// EXAMPLE VARIABLES
//-----------------------------------------------------

// ID of the ticket to be updated
$ticketId = 5;

// ID of the new agent to assign this ticket to
$agentId = 2;

//-----------------------------------------------------
// EXAMPLE CODE
//-----------------------------------------------------

// Initialize a ticket builder
$ticket = $api->tickets->createBuilder();

// Set the ticket ID
$ticket->setId($ticketId)
	// Set or change values
	->setSubject('New Subject of the ticket')
	
	// Change or set an Agent
	->assignToAgent($agentId);

$result = $api->tickets->save($ticket);			// Save the ticket to persist the changes

if (!$result->isError()) {
	// Update persisted sucessfully
	$data = $result->getData();
	print_r($data);
} else {
	// Something is wrong . . .  Put on your DEBUG shoes
	echo $result->getErrorMessage();
}
