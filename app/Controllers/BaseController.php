<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form','html','text','number','date'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		/*
		$this->response->CSP->addBaseURI('localhost', true);
		$this->response->CSP->setDefaultSrc('self');
		$this->response->CSP->addFormAction('self');
		$this->response->CSP->addStyleSrc('cdn.datatables.net','cdn.jsdelivr.net');
		$this->response->CSP->addFontSrc('cdn.datatables.net','cdn.jsdelivr.net');
		$this->response->CSP->addScriptSrc('cdn.datatables.net','cdn.jsdelivr.net','code.jquery.com');
		$this->response->CSP->addObjectSrc('cdn.datatables.net','cdn.jsdelivr.net','code.jquery.com');
		$this->response->CSP->addManifestSrc('cdn.datatables.net','cdn.jsdelivr.net','code.jquery.com');
		*/

		$this->session = \Config\Services::session();
		$this->email = \Config\Services::email();
		$this->image = \Config\Services::image();
		$this->security = \Config\Services::security();
		$this->form_validation = \Config\Services::validation();

		$this->settings = new \Config\Settings();
		$this->mimes = new \Config\Mimes();
		$this->recaptcha = new \App\Libraries\Recaptcha();
	}

}
