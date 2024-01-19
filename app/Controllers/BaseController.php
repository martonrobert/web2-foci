<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    protected $tokenData;

    protected $userName;
    protected $userId;
    protected $isAdminUser;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        helper('cookie');
        $this->tokenData = null;
        $db = \Config\Database::connect();
        $token = $this->request->getCookie('foci-ssid');

        if ($token) {
            $stmt = $db->query('select t.*, f.adminisztrator, f.nev, f.id as user_id, f.email  
                                from tokens t
                                    join felhasznalok f on f.id = t.felhasznalo_id
                                where t.token_str = ? and t.torolt = 0 and f.allapot = ?', array($token, 'A'));
            $this->tokenData = $stmt->getRow();
            $this->userName = $this->tokenData->nev;
            $this->userId = $this->tokenData->user_id;
            $this->isAdminUser = ((int) $this->tokenData->adminisztrator == 1);
        }

    }
}
