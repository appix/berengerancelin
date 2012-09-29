<?php

class PageComponents extends sfComponents {

    public function executeMenu() {
	$criteria = new Criteria();
	$criteria->add(PagePeer::LANGUAGE, $this->getUser()->getViewLanguage(), CRITERIA::EQUAL);
	$criteria->add(PagePeer::PUBLISHED, true, CRITERIA::EQUAL);
	$criteria->add(PagePeer::MENU_INDEX, 0, CRITERIA::GREATER_THAN);
	$criteria->addAscendingOrderByColumn(PagePeer::MENU_INDEX);
	$this->menus = PagePeer::doSelect($criteria);
    }

    public function executeChangeLanguage() {
	$this->languages = array(
		'fr' => array('image' => 'flag_fr.png'),
		'en' => array('image' => 'flag_en.png')
	);
    }

}
