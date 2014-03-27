<?php

namespace DeskPRO\Service;

/**
 * The Feedbacks Service
 * Handles feed related operations
 *
 * @link https://support.deskpro.com/kb/articles/105-feedback Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class Feedbacks extends AbstractService
{
	/**
	 * Creates and returns a search criteria
	 * 
	 * @return \DeskPRO\Criteria\Feedback
	 */
	public function createCriteria()
	{
		return new \DeskPRO\Criteria\Feedback();
	}

	/**
	 * Creates and returns a TaskBuilder object
	 * 
	 * @return \DeskPRO\Builder\Task
	 */
	public function createTaskEditor()
	{
		return new \DeskPRO\Builder\Task();
	}

	/**
	 * Finds tasks matching the criteria
	 * 
	 * @param \DeskPRO\Criteria\Feedback $criteria
	 * @return \DeskPRO\Api\Result
	 */
	public function find(\DeskPRO\Criteria\Feedback $criteria)
	{
		return $this->call('GET', '/feedback', $criteria->toArray());
	}
	
	/**
	 * Gets a Feedback by ID
	 * 
	 * @param int $feedbackId
	 * @return \DeskPRO\Api\Result
	 */
	public function findById($feedbackId)
	{
		return $this->call('GET', '/feedback/' . intval($feedbackId));;
	}

	/**
	 * Saves a Feedback
	 * 
	 * @param \DeskPRO\Builder\Feedback $feedback
	 * @return \DeskPRO\Api\Result
	 */
	public function save(\DeskPRO\Builder\Feedback $feedback)
	{
		$info = $this->_enforceFileUploadIsset($feedback->getDataArray(), 'attach', true);
		
		if ($feedback->getId()) {
			return $this->call('POST', '/feedback/' . intval($feedback->getId()), $info);
		}
		return $this->call('POST', '/feedback', $info);;
	}
	
	/**
	 * Deletes a feedback by ID
	 * 
	 * @param int $feedbackId ID of the feedback to be deleted
	 * @return \DeskPRO\Api\Result
	 */
	public function deleteById($feedbackId)
	{
		return $this->call('DELETE', '/feedback/' . intval($feedbackId));
	}
	
	/**
	 * Gets all comments on a feedback entry.
	 * 
	 * @param int $feedbackId ID of the feedback to search for comments
	 * @return type
	 */
	public function getComments($feedbackId)
	{
		return $this->call('GET', '/feedback/' . intval($feedbackId) . '/comments');
	}
	
	/**
	 * Add a comment for a feedback entry
	 * 
	 * @param int $feedbackId ID of the feedback entry
	 * @param string $content Text of the comment.
	 * @param int $personId ID of the person that owns the comment. If not provided, defaults to the agent making the request.
	 * @param string $status Status of the comment. Defaults to visible.
	 * @return \DeskPRO\Api\Result
	 */
	public function addComment($feedbackId, $content, $personId = null, $status = null)
	{
		$params = array(
		    'content'	=> $content,
		    'person_id'	=> $personId,
		    'status'	=> $status
		);
		
		return $this->call('POST', '/feedback/' . intval($feedbackId) . '/comments', $params);
	}
	
	/**
	 * Gets info about a specific feedback comment
	 * 
	 * @param int $feedbackId ID of the feedback
	 * @param int $commentId ID of the comment
	 * @return \DeskPRO\Api\Result
	 */
	public function getComment($feedbackId, $commentId)
	{
		return $this->call('GET', '/feedback/' . intval($feedbackId) . '/comments/' . intval($commentId));
	}
	
	/**
	 * Updates a comment
	 * 
	 * @param int $feedbackId ID of the feedback entry
	 * @param int $commentId Comment ID
	 * @param string $content new content
	 * @param string $status new status
	 * @return \DeskPRO\Api\Result
	 */
	public function updateComment($feedbackId, $commentId, $content, $status = NULL)
	{
		$params = array(
		    'content'	=> $content,
		    'status'	=> $status
		);
		
		return $this->call('POST', '/feedback/' . intval($feedbackId) . '/comments/' . intval($commentId), $params);
	}
	
	/**
	 * Deletes a feedback comment
	 * 
	 * @param int $feedbackId Feedback ID
	 * @param int $commentId Comment ID that needs to be deleted
	 * @return \DeskPRO\Api\Result
	 */
	public function deleteComment($feedbackId, $commentId)
	{
		return $this->call('DELETE', '/feedback/' . intval($feedbackId) . '/comments/' . intval($commentId));
	}
}