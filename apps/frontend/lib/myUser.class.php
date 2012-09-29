<?php

class myUser extends sfGuardSecurityUser {

    public function getViewLanguage() {
	return $this->getAttribute('view_language', 'fr');
    }

    public function setViewLanguage($language) {
	if ($language == 'fr' || $language == 'en') {
	    $this->setAttribute('view_language', $language);
	}
    }

}
