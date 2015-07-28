<?php

/*
 * This example demonstrate how to get billing charges on a ticket.
 */

//-----------------------------------------------------
// DESKPRO API SETTINGS
//-----------------------------------------------------

require __DIR__.'/../../deskpro-api.php';

$deskpro_url   = 'http://local.deskpro:8888';   // The URL to your helpdesk
$api_key       = '1:7JT8NPSQ8S4WX7B7T7WPQ5MTQ';                      // Your API key (Admin > Apps > API Keys)

// First, create the API object
$api = new \DeskPRO\Api($deskpro_url, $api_key);

//-----------------------------------------------------
// EXAMPLE VARIABLES
//-----------------------------------------------------

$object_type = \DeskPRO\Service\CustomFields::TYPE_BILLING; // ticket charge
$object_id	= 64;

//-----------------------------------------------------
// EXAMPLE CODE
//-----------------------------------------------------

// get the list of custom fields
$result = $api->custom_fields->getCustomFieldsForObject($object_type, $object_id);

if ($result->isError()) {
    // Something is wrong . . .  Put on your DEBUG shoes
    echo $result->getErrorMessage();
    exit;
}


// Request completed successfully
$data = $result->getData();
print_r($data);

foreach ($data as $field) {
    if ('Comment' !== $field['title']) continue;
    $result = $api->custom_fields->setCustomFieldForObject($object_type, $object_id, $field['id'], 'This is a test comment');
    if ($result->isError()) {
        // Something is wrong . . .  Put on your DEBUG shoes
        echo $result->getErrorMessage();
        exit;
    }
    break;
}

$result = $api->custom_fields->getCustomFieldsForObject($object_type, $object_id);
if ($result->isError()) {
    // Something is wrong . . .  Put on your DEBUG shoes
    echo $result->getErrorMessage();
    exit;
}

print_r($result->getData());