<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    berengerancelin
 * @subpackage form
 * @author     Claude Ramseyer
 */
abstract class BasePageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'menu_index' => new sfWidgetFormInputText(),
      'content'    => new sfWidgetFormTextarea(),
      'language'   => new sfWidgetFormInputText(),
      'published'  => new sfWidgetFormInputCheckbox(),
      'homepage'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'slug'       => new sfValidatorString(array('max_length' => 255)),
      'menu_index' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
      'language'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'published'  => new sfValidatorBoolean(array('required' => false)),
      'homepage'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }


}
