<?php

class ContactForm extends sfForm {

    public function configure() {
	parent::configure();
	$this->setWidgets(
		array(
			'lastname' => new sfWidgetFormInput(),
			'firstname' => new sfWidgetFormInput(),
			'address' => new sfWidgetFormInput(),
			'phone' => new sfWidgetFormInput(),
			'email' => new sfWidgetFormInput(),
			'content' => new sfWidgetFormTextarea()
		)
	);
	$this->widgetSchema->setLabels(
		array(
			'lastname' => 'Nom',
			'firstname' => 'Prénom',
			'address' => 'Adresse',
			'phone' => 'Téléphone',
			'email' => 'eMail',
			'content' => 'Message'
		)
	);
	$this->setValidators(
		array(
			'lastname' => new sfValidatorString(array(), array('required' => 'Requis')),
			'firstname' => new sfValidatorString(array(), array('required' => 'Requis')),
			'address' => new sfValidatorString(array(), array('required' => 'Requis')),
			'phone' => new sfValidatorString(array(), array('required' => 'Requis')),
			'email' => new sfValidatorEmail(array(), array('required' => 'Requis', 'invalid' => 'L\'email est invalide')),
			'content' => new sfValidatorString(array(), array('required' => 'Vous n\'avez pas ecrit de message'))
		)
	);
	$this->widgetSchema->setFormFormatterName('list');
	$this->widgetSchema->setNameFormat('contact[%s]');
    }

}