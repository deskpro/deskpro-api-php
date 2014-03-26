DeskPRO PHP API Wrapper
=======================

The DeskPRO PHP API wrapper is a simple class to access and interact with DeskPRO's REST API. It wraps the actual requests up in an easy-to-use API of simple PHP calls.

For more information on the underlying REST API, please see our [API documentation](http://support.deskpro.com/kb/17-deskpro-api).

Wrapper Requirements
--------------------

The PHP API wrapper requires PHP 5.2 or newer with the cURL extension.

The wrapper can only integrate with DeskPRO v4 build 129 or newer.

Using the Wrapper
-----------------

Full documentation on using the PHP wrapper class is maintained with our [API documentation](http://support.deskpro.com/kb/17-deskpro-api). Specific wrapper documentation can be found [here](https://support.deskpro.com/kb/articles/97-deskpro-api-wrapper-php).

Example: Creating a new ticket
------------------------------

    require 'src/DpApi.php';

    $api = new DpApi('https://support.example.com/', '123:XXXXXXXXXXXXXXXXXX');
    $api->createTicket(array(
        'person_email' => 'john@example.com',
        'person_name'  => 'John Doe',
        'subject'      => 'New Ticket',
        'message'      => 'This is a new ticket.',
    ));