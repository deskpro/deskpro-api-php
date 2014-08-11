Upload a file
--------------------------------------

Uploads a file and returns information about the `blob` that was created.
This blob can then be used in other places that accept `attach_id` values.

    $result = $api->misc->uploadFile('path/to/file.ext');

Exchange credentials for a token
--------------------------------------

This allows you to exchange an agent's email and password for a token which can be used to access the API.

    $result = $api->misc->exchangeForToken($email, $password);

Gets the person attached to a session code.
--------------------------------------

    $result = $api->misc->getSessionPerson($session_code);

Gets snippet categories
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->listSnippetCategories($type)

Gets information about the category.
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->getSnippetCategory($type, $categoryId);

Update a snippet category
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $isGlobal = true;

    $result = $api->misc->updateSnippetCategory($type, $categoryId, $isGlobal);

Deletes the snippet category.
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->deleteSnippetCategory($type, $categoryId);

Gets snippets.
--------------------------------------
Optionally narrow results by providing a category.
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->listSnippets($type, $categoryId);

Update a snippet
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->updateSnippet($type, $snippetId, $categoryId);

Gets information about the snippet.
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->getSnippet($type, $snippetId);


Deletes the snippet.
--------------------------------------
`$type` can be 'tickets' or 'chat'

    $result = $api->misc->deleteSnippet($type, $snippetId);