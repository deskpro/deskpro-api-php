<?php

namespace DeskPRO\Service;

/**
 * The Custom Fields Service
 */
class CustomFields extends AbstractService
{
	/**
	 * Gets all custom fields.
	 *
	 * @param null $owner
	 * @param null $context
	 * @return DpApiResult
	 */
	public function all($owner = null, $context = null)
	{
		return $this->call('GET', '/custom_fields', array('owner' => $owner, 'context' => $context));
	}

	/**
	 * Gets a Field by ID
	 * 
	 * @param int $id
	 * @return \DeskPRO\Api\Result
	 */
	public function findById($id)
	{
		return $this->call('GET', sprintf('/custom_fields/%d',$id));
	}

	/**
	 * Deletes a Field by ID
	 * 
	 * @param int $id ID of the Custom Field
	 * @return \DeskPRO\Api\Result
	 */
	public function deleteById($id)
	{
		return $this->call('DELETE', sprintf('/custom_fields/%d',$id));
	}

	/**
	 * Gets custom field choices.
	 *
	 * @param int $id Custom Field ID
	 * @param null $context
	 * @param null $contextId
	 * @return DpApiResult
	 */
	public function choices($id, $context = null, $contextId = null)
	{
		return $this->call(
			'GET', sprintf('/custom_fields/%d/children', $id),
			array('context' => $context, 'context_id' => $contextId)
		);
	}

	/**
	 * @param $fieldId
	 * @param $personId
	 * @return DpApiResult
	 */
	public function getSpecificUserFieldChoices($fieldId, $personId)
	{
		return $this->choices($fieldId, 'person', $personId);
	}

    /**
     * @param $fieldId
     * @param $personId
     * @param $title
     * @param int $display_order
     * @return DpApiResult
     */
    public function addSpecificUserFieldChoice($fieldId, $personId, $title, $display_order = 0)
	{
		return $this->call('POST', sprintf('/custom_fields/%d/children', $fieldId), array(
			'context' => 'person',
			'context_id' => $personId,
			'title' => $title,
			'display_order' => $display_order,
		));
	}
}
