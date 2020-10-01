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
use App\Models\CoreModel;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	protected $model;
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		 helper('assets');
		 helper('datafunc');

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->model = new CoreModel();

	}

	public function loadLayout($content="", $data = array(), $has_side = true, $has_nav = true, $has_footer = true){
		$headerData['nav'] = $has_nav;
		$headerData['sidenav'] = $has_side;
		$headerData['footer'] = $has_footer;

		echo view('baselayout/header.php',$headerData);
		if ($content != "") {
			echo view($content, $data);
		}

		echo view('baselayout/footer.php',$headerData);

	}

}
