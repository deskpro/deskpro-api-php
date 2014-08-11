Search for articles matching criteria
--------------------------------------

    $criteria = $api->articles->createCriteria();

    $criteria->addCategory(1);

    $result = $api->articles->find($criteria);

Creates a new article
--------------------------------------

    $builder = $api->articles->createArticleEditor();

    $builder->setTitle("This is the title")
            ->setContent("Article Content goes here")
            ->addLabel("API")
            ->addCategory(1);

    $result = $api->articles->save($builder);

Gets information about an article
-----------------------------------

    $result = $api->articles->findById(3);

Updates an article
-----------------------------------

    $builder = $api->articles->createArticleEditor();

    $builder->setId(3)->setTitle("Article updated by API");

    $result = $api->articles->save($builder);

Deletes an article
-----------------------------------

    $result = $api->articles->deleteById(3);

Gets all comments on an article.
-----------------------------------

    $result = $api->articles->getArticleComments(4);

Adds a comment to an article.
-----------------------------------
    
    $articleId = 4;
    $personId = 4;

    $result = $api->articles->addArticleComment($articleId, 'Comment added via API', $personId);

Gets a specific comment on an article.
-------------------------------------

    $articleId = 4;
    $commentId = 2;
    $result = $api->articles->getArticleComment($articleId, $commentId);

Updates a specific comment on an article.
--------------------------------------

    $articleId = 4;
    $commentId = 2;
    $result = $api->articles->updateArticleComment($articleId, $commentId, 'New Comment Content');

Deletes a specific comment on an article.
-----------------------------------

    $articleId = 4;
    $commentId = 2;
    $result = $api->articles->deleteArticleComment($articleId, $commentId);

Gets all votes associated with an article.
-----------------------------------

    $articleId = 4;
    $result = $api->articles->getArticleVotes($articleId);

Gets all attachments associated with an article.
-----------------------------------
    
    $articleId = 4;
    $result = $api->articles->getArticleAttachments($articleId);

Adds an attachment to an article.
-----------------------------------
    
    $articleId = 4;
    $result = $api->articles->addArticleAttachment($articleId, '/path/to/file.ext');

Determines if an article has a specific attachment ID.
-----------------------------------

    $articleId      = 4;
    $attachmentId   = 1;
    $result = $api->articles->getArticleAttachment($articleId, $attachmentId);

Removes an attachment from an article.
-----------------------------------

    $articleId      = 4;
    $attachmentId   = 1;
    $result = $api->articles->removeArticleAttachment($articleId, $attachmentId);

Gets all labels associated with an article.
-----------------------------------

    $articleId      = 4;
    $result = $api->articles->getArticleLabels($articleId);

Adds a label to an article.
-----------------------------------

    $articleId      = 4;
    $result = $api->articles->addArticleLabel($articleId, 'label text here');

Determines if an article has a specific label.
------------------------------------

    $articleId      = 4;
    $result = $api->articles->getArticleLabel($articleId, 'label text');

Removes a label from an article.
------------------------------------

    $articleId      = 4;
    $result = $api->articles->removeArticleLabel($articleId, 'label text');

Gets a list of article comments awaiting validation.
------------------------------------

    $result = $api->articles->getValidatingComments();

Gets a list of articles categories.
------------------------------------

    $result = $api->articles->getCategories();

Creates an article category.
------------------------------------

    $title = 'Article Title';
    $parentId = 1;
    
    $result = $api->articles->createCategory($title, $parentId);

Gets an article category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->articles->getCategory($categoryId);

Updates an article category.
------------------------------------
    
    $categoryId = 1;
    $title = 'Updated Title';
    $parentId = 2;
    
    $result = $api->articles->updateCategory($categoryId, $title, $parentId);

Deletes an article category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->articles->deleteCategoryById($categoryId);

Gets articles in an article category.
------------------------------------

    $categoryId = 1;
    $page = 1;
    
    $result = $api->articles->getCategoryArticles($categoryId, $page);

Gets all groups that can access an article category.
------------------------------------

    $categoryId = 1;
    
    $result = $api->articles->getCategoryGroups($categoryId);

Adds a group to an article category.
------------------------------------
    
    $categoryId = 1;
    $groupId    = 1;

    $result = $api->articles->addCategoryGroup($categoryId, $groupId);

Determines if a particular group ID exists for an article category.
------------------------------------

    $categoryId = 1;
    $groupId    = 1;

    $result = $api->articles->getCategoryGroup($categoryId, $groupId);

Removes a group's access to an article category
------------------------------------

    $categoryId = 1;
    $groupId    = 1;

    $result = $api->articles->deleteCategoryGroup($categoryId, $groupId);

Gets a list of articles fields.
------------------------------------

    $result = $api->articles->getFields();

Gets a list of articles products.
------------------------------------

    $result = $api->articles->getProducts();

Gets all glossary words.
------------------------------------

    $result = $api->articles->getWords();

Gets matching glossary words.
------------------------------------

    $result = $api->articles->getWords('test word');

Adds a glossary word.
------------------------------------

    $result = $api->articles->addWord(array('word1', 'word2'), 'Word Definition')

Looks up a glossary word.
------------------------------------

    $result = $api->articles->lookupWord('word1');

Gets a glossary word
------------------------------------

    $result = $api->articles->getWord($wordId);

Deletes a glossary word
------------------------------------

    $result = $api->articles->deleteWordById($wordId);

Gets a glossary word definition
------------------------------------
    
    $result = $api->articles->getWordDefinition($wordId);

Updates a glossary word definition
------------------------------------

    $result = $api->articles->updateWordDefinition($wordId, array $params);

Deletes a glossary word definition
------------------------------------

    $result = $api->articles->deleteGlossaryWordDefinition($wordId);