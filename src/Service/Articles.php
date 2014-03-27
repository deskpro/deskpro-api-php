<?php

namespace DeskPRO\Service;

/**
 * The Articles API
 * Handles article/kb related operations
 *
 * @link https://support.deskpro.com/kb/articles/99-knowledgebase-articles Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class Articles extends AbstractService
{
    /**
	 * Creates and returns a search criteria
	 * 
	 * @return \DeskPRO\Criteria\Article
	 */
	public function createCriteria() 
	{
		return new \DeskPRO\Criteria\Article();
	}
    
    /**
     * Creates and returns a ArticleBuilder object
     * 
     * @return \DeskPRO\Builder\Article
     */
    public function createArticleEditor()
    {
        return new \DeskPRO\Builder\Article();
    }
    
    /**
     * Finds articles matching the criteria
     * 
     * @param \DeskPRO\Criteria\Article $criteria
     * @return \DpApiResult
     */
    public function find(\DeskPRO\Criteria\Article $criteria) 
    {
        return $this->interface->findArticles($criteria->toArray());
    }
    
    /**
     * Gets an Article by article ID
     * 
     * @param int $articleId
     * @return \DpApiResult Result Object
     */
    public function findById($articleId)
    {
        return $this->interface->getArticle($articleId);
    }
    
    /**
     * Saves a task
     * 
     * @param \DeskPRO\Builder\Article $article
     * @return \DpApiResult
     */
    public function save(\DeskPRO\Builder\Article $article) 
    {
        if ($article->getId()) {
            return $this->interface->updateArticle($article->getId(), $article->getDataArray());
        }
        
        return $this->interface->createArticle($article->getDataArray());
    }
    
    /**
	 * Deletes the given article.
	 *
	 * @param int $articleId
	 *
	 * @return \DpApiResult
	 */
	public function deleteById($articleId)
	{
        return $this->interface->deleteArticle($articleId);
    }
    
    /**
	 * Gets all comments on an article.
	 *
	 * @param int $articleId
	 *
	 * @return \DpApiResult
	 */
	public function getArticleComments($articleId)
	{
        return $this->interface->getArticleComments($articleId);
    }
    
    /**
     * Adds a comment to an article.
     * 
     * @param int $articleId Article ID
     * @param string $content Comment content
     * @param int $personId D of the person that owns the comment. If not provided, defaults to the agent making the request.
     * @param string $status Status of the comment. Defaults to visible.
     * @return \DpApiResult
     */
	public function addArticleComment($articleId, $content, $personId = null, $status = null)
	{
        return $this->interface->addArticleComment($articleId, array(
            'content'   => $content,
            'person_id' => $personId,
            'status'    => $status
        ));
    }
    
    /**
	 * Gets a comment on an article.
	 *
	 * @param int $articleId ID of the article
	 * @param int $commentId ID of the comment
	 *
	 * @return \DpApiResult
	 */
	public function getArticleComment($articleId, $commentId)
	{
        return $this->interface->getArticleComment($articleId, $commentId);
    }
    
    /**
     * Updates a comment on an article.
     * 
     * @param int $article_id ID of the article
     * @param int $comment_id ID of the comment to update
     * @param string $content New content to set
     * @param string $status new status to set
     * @return \DpApiResult
     */
	public function updateArticleComment($article_id, $comment_id, $content, $status = null)
	{
        return $this->interface->updateArticleComment($article_id, $comment_id, array(
            'content'   => $content,
            'status'    => $status
        ));
    }
    
    /**
	 * Deletes a comment on an article.
	 *
	 * @param int $articleId
	 * @param int $commentId
	 *
	 * @return \DpApiResult
	 */
	public function deleteArticleComment($articleId, $commentId)
	{
        return $this->interface->deleteArticleComment($articleId, $commentId);
    }
    
    /**
	 * Gets all votes associated with an article.
	 *
	 * @param int $articleId
	 *
	 * @return \DpApiResult
	 */
	public function getArticleVotes($articleId)
	{
        return $this->interface->getArticleVotes($articleId);
    }
    
    /**
	 * Gets all attachments associated with an article.
	 *
	 * @param int $articleId
	 *
	 * @return \DpApiResult
	 */
	public function getArticleAttachments($articleId)
	{
        return $this->interface->getArticleAttachments($articleId);
    }
    
    /**
	 * Adds an attachment to an article.
	 *
	 * @param int $id
	 * @param DpApiFileUpload|string|null $attach File to upload
	 * @param integer|null $attach_id Existing attachment ID (blob ID), possibly from uploadFile()
	 *
	 * @return \DpApiResult
	 */
	public function addArticleAttachment($id, $attach = null, $attach_id = null)
	{
        return $this->addArticleAttachment($id, $attach, $attach_id);
    }
    
    /**
	 * Determines if an article has a specific attachment ID.
	 *
	 * @param int $articleId
	 * @param int $attachmentId
	 *
	 * @return \DpApiResult
	 */
	public function getArticleAttachment($articleId, $attachmentId)
	{
        return $this->interface->getArticleAttachment($articleId, $attachmentId);
    }
    
    /**
	 * Removes an attachment from an article.
	 *
	 * @param int $articleId
	 * @param int $attachmentId
	 *
	 * @return \DpApiResult
	 */
	public function removeArticleAttachment($articleId, $attachmentId)
	{
        return $this->interface->removeArticleAttachment($articleId, $attachmentId);
    }
    
    /**
	 * Gets all labels associated with an article.
	 *
	 * @param int $articleId
	 *
	 * @return \DpApiResult
	 */
	public function getArticleLabels($articleId)
	{
        return $this->interface->getArticleLabels($articleId);
    }
    
    /**
	 * Adds a label to an article.
	 *
	 * @param int $articleId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function addArticleLabel($articleId, $label)
	{
        return $this->interface->addArticleLabel($articleId, $label);
    }
    
    /**
	 * Determines if an article has a specific label.
	 *
	 * @param int $articleId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function getArticleLabel($articleId, $label)
	{
        return $this->interface->getArticleLabel($articleId, $label);
    }
    
    /**
	 * Removes a label from an article.
	 *
	 * @param integer $articleId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function removeArticleLabel($articleId, $label)
	{
        return $this->interface->removeArticleLabel($articleId, $label);
    }
    
    /**
	 * Gets a list of article comments awaiting validation.
	 *
	 * @return \DpApiResult
	 */
	public function getArticleValidatingComments()
	{
        return $this->interface->getArticleValidatingComments();
    }
    
    /**
	 * Gets a list of articles categories.
	 *
	 * @return \DpApiResult
	 */
	public function getArticlesCategories()
	{
        return $this->interface->getArticlesCategories();
    }
    
    /**
     * Creates an article category.
     * 
     * @param string $title title of the category
     * @param int $parent_id ID of the category's parent. Use 0 for no parent.
     * @param int $display_order Order of display of categories. Lower numbers will be displayed first.
     * @param int $usergroupId ID of user group that has access. If not provided, defaults to all users.
     * @return \DpApiResult
     */
	public function createArticleCategory($title, $parent_id = null, $display_order = null, $usergroupId = null)
	{
        return $this->interface->createArticleCategory(array(
            'title'         => $title,
            'parent_id'     => $parent_id,
            'display_order' => $display_order,
            'usergroup_id'  => $usergroupId
        ));
    }
    
    /**
	 * Gets an article category.
	 *
	 * @param int $articleCategoryId ID of the article category
	 *
	 * @return \DpApiResult
	 */
	public function getArticleCategory($articleCategoryId)
	{
        return $this->interface->getArticleCategory($articleCategoryId);
    }
}