<?php

/**
 * Profil form base class.
 *
 * @method Profil getObject() Returns the current form's model object
 *
 * @package    berengerancelin
 * @subpackage form
 * @author     Claude Ramseyer
 */
abstract class BaseProfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'firstname' => new sfWidgetFormInputText(),
      'lastname'  => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'birthdate' => new sfWidgetFormDate(),
      'phone'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'firstname' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birthdate' => new sfValidatorDate(array('required' => false)),
      'phone'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profil';
  }


}
