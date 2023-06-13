<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    public $adminModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        helper('time');
        $db = db_connect();
        
        $this->adminModel = new adminModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }

    //User Account Status Update by Admin
    public function admin()
    {

    }
}