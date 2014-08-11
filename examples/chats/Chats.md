Finds chats matching the criteria
--------------------------------------

    $criteria = $api->chats->createCriteria();

    $criteria->addAgent($agentId)
            ->addDepartment($departmentId)
            ->addLabel('label text')
            ->createdBy($personId);

    $result = $api->chats->find($criteria);

Gets information about a chat
--------------------------------------

    $result = $api->chats->findById($chatId);

Updates a Chat
--------------------------------------

    $result = $api->chats->update($chatId, $newDepartmentId);

Leave a chat and takes an additional action
--------------------------------------
`$action` can be one of `empty`, `unassign`, or `end`

    $result = $api->chats->leave($chatId, $action);

Ends a chat.
--------------------------------------

    $result = $api->chats->end($chatId);

Gets all messages in a chat
--------------------------------------

    $result = $api->chats->getMessages($chatId);

Creates a new message in a chat.
--------------------------------------

    $result = $api->chats->addMessage($chatId, $message);

Adds a chat participant.
--------------------------------------

    $result = $api->chats->addParticipant($chatId, $personId);

Returns whether a person is a participant (CC user) in a chat.
--------------------------------------

    $result = $api->chats->getParticipant($chatId, $personId);

Removes a participant from a chat.
--------------------------------------

    $result = $api->chats->removeParticipant($chatId, $personId);

Gets all labels associated with a chat.
--------------------------------------

    $result = $api->chats->getLabels($chatId);

Adds a label to a chat.
--------------------------------------

    $result = $api->chats->addLabel($chatId, $label);

Determines if a chat has a specific label.
--------------------------------------

    $result = $api->chats->getLabel($chatId, $label);

Removes a label from a chat.
--------------------------------------

    $result = $api->chats->removeLabel($chatId, $label);