<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\loginModel;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    public $adminModel;
    public $loginModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        helper('time');
        $db = db_connect();
        
        $adminModel = new adminModel();
        $session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }

    
    
}