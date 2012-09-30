<?php

require_once dirname(__FILE__) . '/../lib/profilGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/profilGeneratorHelper.class.php';

/**
 * profil actions.
 *
 * @package    berengerancelin
 * @subpackage profil
 * @author     Claude Ramseyer
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class profilActions extends autoProfilActions {

    public function executeViewProfil() {
	$this->profil = $this->getUser()->getGuardUser()->getProfile();
    }

    public function executeEditProfil() {
	$this->profil = $this->getUser()->getGuardUser()->getprofile();
    }

}
