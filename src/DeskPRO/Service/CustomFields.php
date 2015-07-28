<?php

namespace DeskPRO\Service;

/**
 * The Custom Fields Service
 */
class CustomFields extends AbstractService
{
	const TYPE_BILLING = 'billing';
    const TYPE_TICKET = 'ticket';
    const TYPE_PERSON = 'person';
    const TYPE_ORG = 'org';

    protected $allowed = array(
        self::TYPE_BILLING => 1,
        self::TYPE_TICKET => 1,
        self::TYPE_PERSON => 1,
        self::TYPE_ORG => 1,
    );

	/**
	 * Gets all contextual custom fields.
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
	 * Gets a contextual Field by ID
	 *
	 * @param int $id
	 * @return \DeskPRO\Api\Result
	 */
	public function findById($id)
	{
		return $this->call('GET', sprintf('/custom_fields/%d',$id));
	}

	/**
	 * Deletes a contextual Field by ID
	 *
	 * @param int $id ID of the Custom Field
	 * @return \DeskPRO\Api\Result
	 */
	public function deleteById($id)
	{
		return $this->call('DELETE', sprintf('/custom_fields/%d',$id));
	}

	/**
	 * Gets contextual custom field choices.
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

    /**
     * @param $type
     * @param $objectId
     * @return DpApiResult
     * @throws \Exception
     */
    public function getCustomFieldsForObject($type, $objectId)
    {
        if (!isset($this->allowed[$type])) {
            throw new \Exception('Invalid custom field type');
        }

        return $this->call('GET', sprintf('/custom_fields/%s/%d', $type, $objectId));
    }

    /**
     * @param $type
     * @param $objectId
     * @param $fieldId
     * @param $value
     * @return DpApiResult
     * @throws \Exception
     */
    public function setCustomFieldForObject($type, $objectId, $fieldId, $value)
    {
        if (!isset($this->allowed[$type])) {
            throw new \Exception('Invalid custom field type');
        }

        return $this->call('POST', sprintf('/custom_fields/%s/%d', $type, $objectId), array(
            'id' => $fieldId,
            'value' => $value,
        ));
    }
}
