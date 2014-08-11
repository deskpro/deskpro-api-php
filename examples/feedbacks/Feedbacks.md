Search for feedbacks matching criteria
--------------------------------------

    $criteria = $api->feedbacks->createCriteria();

    $date = 1364816698; // Unix timestamp of the date

    $criteria->addCategory(1)
            ->createdBefore($date)
            ->addLabel('label text');

    $result = $api->feedbacks->find($criteria);

Creates a new feedback
--------------------------------------

    $builder = $api->feedbacks->createFeedbackEditor();

    $builder->setTitle('Feedback Title')
            ->setContent('Feedback Content')
            ->setCategory(1)
            ->addLabel('label text');

    $result = $api->feedbacks->save($builder);

Gets information about a feedback
-----------------------------------

    $result = $api->feedbacks->findById(3);

Updates a feedback
-----------------------------------

    $builder = $api->feedbacks->createFeedbackEditor();

    $builder->setId(3)->setTitle("Feedback updated by API");

    $result = $api->feedbacks->save($builder);

Deletes a feedback
-----------------------------------

    $result = $api->feedbacks->deleteById(3);

Gets all comments on a feedback.
-----------------------------------

    $result = $api->feedbacks->getFeedbackComments(4);

Adds a comment to a feedback.
-----------------------------------
    
    $result = $api->feedbacks->addFeedbackComment($feedbackId, 'Comment added via API', $personId);

Gets a specific comment on a feedback.
-------------------------------------

    $result = $api->feedbacks->getFeedbackComment($feedbackId, $commentId);

Updates a specific comment on a feedback.
--------------------------------------

    $result = $api->feedbacks->updateFeedbackComment($feedbackId, $commentId, 'New Comment Content');

Deletes a specific comment on a feedback.
-----------------------------------

    $result = $api->feedbacks->deleteFeedbackComment($feedbackId, $commentId);

Merges two feedback records.
-----------------------------------
`$target` is the ID of the feedback that the other will be merged into
`$from` This feedback will be removed on a successful merge

    $result = $api->feedbacks->merge($target, $from);

Gets all votes associated with a feedback.
-----------------------------------

    $result = $api->feedbacks->getVotes($feedbackId);

Gets all attachments associated with a feedback.
-----------------------------------

    $result = $api->feedbacks->getAttachments($feedbackId);

Adds an attachment to a feedback.
-----------------------------------
    
    $result = $api->feedbacks->addAttachment($feedbackId, '/path/to/file.ext');

Determines if a feedback has a specific attachment ID.
-----------------------------------

    $result = $api->feedbacks->getAttachment($feedbackId, $attachmentId);

Removes an attachment from a feedback.
-----------------------------------

    $result = $api->feedbacks->removeAttachment($id, $attachmentId);

Gets all labels associated with a feedback.
-----------------------------------

    $result = $api->feedbacks->getFeedbackLabels($feedbackId);

Adds a label to a feedback.
-----------------------------------

    $result = $api->feedbacks->addFeedbackLabel($feedbackId, 'label text here');

Determines if a feedback has a specific label.
------------------------------------

    $result = $api->feedbacks->getFeedbackLabel($feedbackId, 'label text');

Removes a label from a feedback.
------------------------------------

    $result = $api->feedbacks->removeFeedbackLabel($feedbackId, 'label text');

Gets a list of feedback comments awaiting validation.
------------------------------------

    $result = $api->feedbacks->getValidatingComments();

Gets a list of feedbacks categories.
------------------------------------

    $result = $api->feedbacks->getCategories();

Gets a list of feedback status categories ("statuses" in the admin interface).
------------------------------------

    $result = $api->feedbacks->getStatusCategories();

Gets a list of feedback user categories ("categories" in the admin interface).
------------------------------------

    $result = $api->feedbacks->getUserCategories();