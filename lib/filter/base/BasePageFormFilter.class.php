<?php

/**
 * Page filter form base class.
 *
 * @package    berengerancelin
 * @subpackage filter
 * @author     Claude Ramseyer
 */
abstract class BasePageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'menu_index' => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'language'   => new sfWidgetFormFilterInput(),
      'published'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'homepage'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'slug'       => new sfValidatorPass(array('required' => false)),
      'menu_index' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'content'    => new sfValidatorPass(array('required' => false)),
      'language'   => new sfValidatorPass(array('required' => false)),
      'published'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'homepage'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'slug'       => 'Text',
      'menu_index' => 'Number',
      'content'    => 'Text',
      'language'   => 'Text',
      'published'  => 'Boolean',
      'homepage'   => 'Boolean',
    );
  }
}
