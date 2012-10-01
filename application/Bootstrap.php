<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		$layout = Zend_Layout::getMvcInstance();

		$view = $layout->getView();
	}

	protected function _initAutoload()
	{
		$loader = new Zend_Application_Module_Autoloader(array(
			'namespace' => '',
			'basePath'  => APPLICATION_PATH));

		return $loader;
	}

	protected function _initSession()
	{
		$session = new Zend_Session_Namespace('project', true);

		return $session;
	}

	protected function _initViewHelpers()
	{
		$view = new Zend_View();
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();

		$view->addHelperPath(APPLICATION_PATH . '/views/helpers');
		$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
		$viewRenderer->setView($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
	}
        
    public function _initTranslations()
    {
        $translate = new Zend_Translate(array (
            'adapter' => 'array',
            'content' => APPLICATION_PATH . '/../data/lang/en/common.php',
            'locale' => 'en',
        ));
        $translate->addTranslation(array (
            'content' => APPLICATION_PATH . '/../data/lang/fr/common.php',
            'locale' => 'fr',
        ));
        Zend_Registry::set('Zend_Translate', $translate);
        return $translate;
    }
}