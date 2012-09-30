<?php

class PageActions extends sfActions {

    public function executeIndex() {
	$criteria = new Criteria();
	$criteria->add(PagePeer::PUBLISHED, true, CRITERIA::EQUAL);
	$criteria->add(PagePeer::HOMEPAGE, true, CRITERIA::EQUAL);
	$criteria->add(PagePeer::LANGUAGE, $this->getUser()->getViewLanguage(), CRITERIA::EQUAL);
	$this->page = PagePeer::doSelectOne($criteria);
    }

    public function executeShow() {
	$slug = $this->getRequestParameter("slug");
	if($slug) {
	    $criteria = new Criteria();
	    $criteria->add(PagePeer::SLUG, $slug, CRITERIA::EQUAL);
	    $criteria->add(PagePeer::PUBLISHED, true, CRITERIA::EQUAL);
	    $criteria->add(PagePeer::LANGUAGE, $this->getUser()->getViewLanguage(), CRITERIA::EQUAL);
	    $this->page = PagePeer::doSelectOne($criteria);
	    if($this->page) {
		return sfView::SUCCESS;
	    }
	}
	$this->redirect404();
    }

    public function executeContact() {
	$this->form = new ContactForm();
	if($this->getRequest()->getMethod() == sfRequest::POST) {
	    $this->form->bind($this->getRequestParameter('contact'));
	    if($this->form->isValid()) {
		$values = $this->form->getValues();
		$message = $this->getMailer()->compose(
			array($values['email'] => $values['lastname'] . ' ' . $values['firstname']),
			sfConfig::get('app_contact_email'),
			'Nouveau message de ' . $values['lastname'] . ' ' . $values['firstname'],
			'Nom : ' . $values['lastname'] . "\n" .
			'Prénom : ' . $values['firstname'] . "\n" .
			'Adresse : ' . $values['address'] . "\n" .
			'Email : ' . $values['email'] . "\n" .
			'Téléphone : ' . $values['phone'] . "\n" .
			'Message : ' . "\n" .
			$values['content']
		);
		$this->getMailer()->send($message);
		$this->redirect('@sent');
	    }
	}
    }

    public function executeSent() {

    }

    public function executeChangeLanguage() {
	$this->getUser()->setViewLanguage($this->getRequestParameter('language', 'fr'));
	$this->redirect("@homepage");
    }

}
