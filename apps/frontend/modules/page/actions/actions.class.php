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
	$this->slug = $this->getRequestParameter("slug");
	if ($slug) {
	    $criteria = new Criteria();
	    $criteria->add(PagePeer::SLUG, $slug, CRITERIA::EQUAL);
	    $criteria->add(PagePeer::PUBLISHED, true, CRITERIA::EQUAL);
	    $criteria->add(PagePeer::LANGUAGE, $this->getUser()->getViewLanguage(), CRITERIA::EQUAL);
	    $this->page = PagePeer::doSelectOne($criteria);
	    if ($this->page) {
		return sfView::SUCCESS;
	    }
	}
	$this->redirect404();
    }

    public function executeContact() {
	$this->post = false;
	if ($this->getRequest()->getMethod() == sfRequest::POST) {
	    $this->post = true;
	    $this->lastname = $this->getRequestParameter('lastname');
	    $this->firstname = $this->getRequestParameter('firstname');
	    $this->phone = $this->getRequestParameter('phone');
	    $this->email = $this->getRequestParameter('email');
	    $this->content = $this->getRequestParameter('content');

	}
    }

    public function executeChangeLanguage() {
	$this->getUser()->setViewLanguage($this->getRequestParameter('language', 'fr'));
	$this->redirect("@homepage");
    }

}
