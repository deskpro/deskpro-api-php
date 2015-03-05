<?php

/*
 * This example gets the person attached to a session code.
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

// Session code for the person

/*
 * Set it manually or you could get the session code right from the DeskPRO cookie.
 * You might need to set the cookie domain to ".example.com" (leading dot) to make it 
 * accessible to sub-domains. You can set that from Admin > Server > Settings.
 */

$session_code	= 'SESSION_CODE';
// $session_code = $_COOKIE['dpsid-agent'];

//-----------------------------------------------------
// EXAMPLE CODE
//-----------------------------------------------------

// Get the Person
$result = $api->misc->getSessionPerson($session_code);

if (!$result->isError()) {
	// Request completed successfully
	$data = $result->getData();
	print_r($data);
} else {
	// Something is wrong . . .  Put on your DEBUG shoes
	echo $result->getErrorMessage();
}
