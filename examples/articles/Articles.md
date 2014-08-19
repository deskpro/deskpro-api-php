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