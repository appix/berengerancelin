<?php

class ProfilForm extends sfFormPropel {

    public function configure() {
	parent::configure();
	$this->setWidgets(
		array(
			'firstname'
		)
	);
    }

    public function getModelName() {
	return 'Profil';
    }

}