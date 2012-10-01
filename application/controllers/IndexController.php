<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
		$this->view->translate = Zend_Registry::get('Zend_Translate');
    }

    public function indexAction()
    {

		$translate = Zend_Registry::get('Zend_Translate');

//		$products = new Model_Products();
//
//		$this->view->products = $products->fetchProducts();
    }

	public function langAction()
	{
		$lang = $this->getRequest()->getParam('lang', 'en');
		$bootstrap = $this->getInvokeArg('bootstrap');
		$bootstrap->bootstrap('translate');
		$translate = $bootstrap->getResource('translate');
		$translate->setLocale($lang);
		Zend_Registry::set('Zend_Translate', $translate);
		Zend_Registry::set('Zend_Locale', $lang);
	}
        
        public function clearAction()
        {
            Zend_Registry::set('Zend_Translate', null);
            zend_Registry::set('Zend_Locale', null);
            return $this->_helper->redirector('index', 'index', 'default');
        }
}