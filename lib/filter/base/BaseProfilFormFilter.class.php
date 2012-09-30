<?php

/**
 * Profil filter form base class.
 *
 * @package    berengerancelin
 * @subpackage filter
 * @author     Claude Ramseyer
 */
abstract class BaseProfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'firstname' => new sfWidgetFormFilterInput(),
      'lastname'  => new sfWidgetFormFilterInput(),
      'email'     => new sfWidgetFormFilterInput(),
      'birthdate' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'phone'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'firstname' => new sfValidatorPass(array('required' => false)),
      'lastname'  => new sfValidatorPass(array('required' => false)),
      'email'     => new sfValidatorPass(array('required' => false)),
      'birthdate' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'phone'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profil';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'user_id'   => 'ForeignKey',
      'firstname' => 'Text',
      'lastname'  => 'Text',
      'email'     => 'Text',
      'birthdate' => 'Date',
      'phone'     => 'Text',
    );
  }
}
