Search for downloads matching criteria
--------------------------------------

    $criteria = $api->downloads->createCriteria();

    $date = 1364816698; // Unix timestamp of the date

    $criteria->addCategory(1)
            ->createdBefore($date)
            ->addLabel('freebies');

    $result = $api->downloads->find($criteria);

Creates a new download
--------------------------------------

    $builder = $api->downloads->createDownloadEditor();

    $builder->attachFile('/path/to/file.ext')
            ->addCategory($categoryId)
            ->addLabel('freebie')
            ->setTitle('DeskPRO desktop client');

    $result = $api->downloads->save($builder);

Gets information about a download
-----------------------------------

    $result = $api->downloads->findById(3);

Updates a download
-----------------------------------

    $builder = $api->downloads->createDownloadEditor();

    $builder->setId(3)->setTitle("Download updated by API");

    $result = $api->downloads->save($builder);

Deletes a download
-----------------------------------

    $result = $api->downloads->deleteById(3);

Gets all comments on a download.
-----------------------------------

    $result = $api->downloads->getDownloadComments(4);

Adds a comment to a download.
-----------------------------------
    
    $downloadId = 4;
    $personId = 4;

    $result = $api->downloads->addDownloadComment($downloadId, 'Comment added via API', $personId);

Gets a specific comment on a download.
-------------------------------------

    $downloadId = 4;
    $commentId = 2;
    $result = $api->downloads->getDownloadComment($downloadId, $commentId);

Updates a specific comment on a download.
--------------------------------------

    $downloadId = 4;
    $commentId = 2;
    $result = $api->downloads->updateDownloadComment($downloadId, $commentId, 'New Comment Content');

Deletes a specific comment on a download.
-----------------------------------

    $downloadId = 4;
    $commentId = 2;
    $result = $api->downloads->deleteDownloadComment($downloadId, $commentId);

Gets all labels associated with a download.
-----------------------------------

    $downloadId      = 4;
    $result = $api->downloads->getDownloadLabels($downloadId);

Adds a label to a download.
-----------------------------------

    $downloadId      = 4;
    $result = $api->downloads->addDownloadLabel($downloadId, 'label text here');

Determines if a download has a specific label.
------------------------------------

    $downloadId      = 4;
    $result = $api->downloads->getDownloadLabel($downloadId, 'label text');

Removes a label from a download.
------------------------------------

    $downloadId      = 4;
    $result = $api->downloads->removeDownloadLabel($downloadId, 'label text');

Gets a list of download comments awaiting validation.
------------------------------------

    $result = $api->downloads->getValidatingComments();

Gets a list of downloads categories.
------------------------------------

    $result = $api->downloads->getCategories();

Creates a download category.
------------------------------------

    $title = 'Download Title';
    $parentId = 1;
    
    $result = $api->downloads->createCategory($title, $parentId);

Gets a download category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->downloads->getCategory($categoryId);

Updates a download category.
------------------------------------
    
    $categoryId = 1;
    $title = 'Updated Title';
    $parentId = 2;
    
    $result = $api->downloads->updateCategory($categoryId, $title, $parentId);

Deletes a download category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->downloads->deleteCategoryById($categoryId);

Gets downloads in a download category.
------------------------------------

    $categoryId = 1;
    $page = 1;
    
    $result = $api->downloads->getCategoryDownloads($categoryId, $page);

Gets all groups that can access a download category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->downloads->getCategoryGroups($categoryId);

Adds a group to a download category.
------------------------------------
    
    $categoryId = 1;
    $groupId    = 1;

    $result = $api->downloads->addCategoryGroup($categoryId, $groupId);

Determines if a particular group ID exists for a download category.
------------------------------------

    $categoryId = 1;
    $groupId    = 1;

    $result = $api->downloads->getCategoryGroup($categoryId, $groupId);

Removes a group's access to a download category
------------------------------------

    $categoryId = 1;
    $groupId    = 1;

    $result = $api->downloads->deleteCategoryGroup($categoryId, $groupId);