<?php

namespace DeskPRO\Service;

/**
 * The Tasks API
 * Handles task related operations
 *
 * @link https://support.deskpro.com/kb/articles/113-tasks Official Documentation
 * @author Abhinav Kumar <abhinav.kumar@deskpro.com>
 */
class Tasks extends AbstractService
{
    /**
	 * Creates and returns a search criteria
	 * 
	 * @return \DeskPRO\Criteria\Task
	 */
	public function createCriteria() 
	{
		return new \DeskPRO\Criteria\Task();
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
     * @param \DeskPRO\Criteria\Task $criteria
     * @return \DpApiResult
     */
    public function find(\DeskPRO\Criteria\Task $criteria) 
    {
        return $this->interface->findTasks($criteria->toArray());
    }
    
    /**
     * Gets an Task by task ID
     * 
     * @param int $taskId
     * @return \DpApiResult Result Object
     */
    public function findById($taskId)
    {
        return $this->interface->getTask($taskId);
    }
    
    /**
     * Saves a task
     * 
     * @param \DeskPRO\Builder\Task $task
     * @return \DpApiResult
     */
    public function save(\DeskPRO\Builder\Task $task) 
    {
        if ($task->getId()) {
            return $this->interface->updateTask($task->getId(), $task->getDataArray());
        }
        
        return $this->interface->createTask($task->getDataArray());
    }
    
    /**
	 * Deletes the given task.
	 *
	 * @param int $taskId
	 *
	 * @return \DpApiResult
	 */
	public function deleteTask($taskId)
	{
        return $this->interface->deleteTask($taskId);
    }
    
    /**
	 * Gets all associations for a task
	 *
	 * @param int $taskId
	 *
	 * @return \DpApiResult
	 */
	public function getTaskAssociations($taskId)
	{
        return $this->interface->getTaskAssociations($taskId);
    }
    
    /**
	 * Adds an association for a task.
	 *
	 * @param int $taskId Task ID
	 * @param int $ticketId Ticket ID to associate the task to
	 *
	 * @return \DpApiResult
	 */
	public function addTaskAssociation($taskId, $ticketId)
	{
        return $this->interface->addTaskAssociation($taskId, $ticketId);
    }
    
    /**
	 * Determines if a particular association ID exists for a task.
	 *
	 * @param int $taskId
	 * @param int $associationId
	 *
	 * @return \DpApiResult
	 */
	public function getTaskAssociation($taskId, $associationId)
	{
        return $this->interface->getTaskAssociation($taskId, $associationId);
    }
    
    /**
	 * Deletes a particular task association
	 *
	 * @param int $taskId
	 * @param int $associationId
	 *
	 * @return \DpApiResult
	 */
	public function deleteTaskAssociation($taskId, $associationId)
	{
        return $this->interface->deleteTaskAssociation($taskId, $associationId);
    }
    
    /**
	 * Gets all comments for a task
	 *
	 * @param int $taskId
	 *
	 * @return \DpApiResult
	 */
	public function getTaskComments($taskId)
	{
        return $this->interface->getTaskComments($taskId);
    }
    
    /**
	 * Adds a comment for a task.
	 *
	 * @param int $taskId
	 * @param string $comment
	 *
	 * @return \DpApiResult
	 */
	public function addTaskComment($taskId, $comment)
	{
        return $this->interface->addTaskComment($taskId, $comment);
    }
    
    /**
	 * Determines if a particular comment ID exists for a task.
	 *
	 * @param int $taskId
	 * @param int $commentId
	 *
	 * @return \DpApiResult
	 */
	public function getTaskComment($taskId, $commentId)
	{
        return $this->interface->getTaskComment($taskId, $commentId);
    }
    
    /**
	 * Deletes a particular task comment
	 *
	 * @param int $taskId
	 * @param int $commentId
	 *
	 * @return \DpApiResult
	 */
	public function deleteTaskComment($taskId, $commentId)
	{
        return $this->interface->deleteTaskComment($taskId, $commentId);
    }
    
    /**
	 * Gets all labels associated with a task.
	 *
	 * @param int $taskId
	 *
	 * @return \DpApiResult
	 */
	public function getTaskLabels($taskId)
	{
        return $this->interface->getTaskLabels($taskId);
    }
    
    /**
	 * Adds a label to a task.
	 *
	 * @param int $taskId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function addTaskLabel($taskId, $label)
	{
        return $this->interface->addTaskLabel($taskId, $label);
    }
    
    /**
	 * Determines if a task has a specific label.
	 *
	 * @param int $taskId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function getTaskLabel($taskId, $label)
	{
        return $this->interface->getTaskLabel($taskId, $label);
    }
    
    /**
	 * Removes a label from a task.
	 *
	 * @param int $taskId
	 * @param string $label
	 *
	 * @return \DpApiResult
	 */
	public function removeTaskLabel($taskId, $label)
	{
        return $this->interface->removeTaskLabel($taskId, $label);
    }
}