<?php

namespace Craft;

class Formerly_FormFieldType extends BaseOptionsFieldType
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritDoc IComponentType::getName()
	 *
	 * @return string
	 */
	public function getName()
	{
		return Craft::t('Formerly Form');
	}

	/**
	 * @inheritDoc IFieldType::getInputHtml()
	 *
	 * @param string $name
	 * @param mixed  $value
	 *
	 * @return string
	 */
	public function getInputHtml($name, $value)
	{

		$forms = craft()->formerly_forms->getAllForms();

		$options = array(array('label' => '','value' => ''));

		foreach ($forms as $form)
		{
			$options[] = array(
				'label' => $form->name,
				'value' => $form->handle
			);
		}

		return craft()->templates->render('_includes/forms/select', array(
			'name'    => $name,
			'value'   => $value,
			'options' => $options
		));

	}

	/**
	 * @inheritDoc BaseElementFieldType::getSettingsHtml()
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return false;
	}

	// Protected Methods
	// =========================================================================

	/**
	 * @inheritDoc BaseOptionsFieldType::getOptionsSettingsLabel()
	 *
	 * @return string
	 */
	protected function getOptionsSettingsLabel()
	{
		return Craft::t('Formerly Form Options');
	}

}
