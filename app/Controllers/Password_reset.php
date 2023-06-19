<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Password_reset extends BaseController
{
    public $loginModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        helper('time');
        $db = db_connect();
        
        //$this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
       //$request = \Config\Services::request();
    }
    public function index($user_id = null)
    {
        $data = [];
        $data['validation'] = null;
        $email = \Config\Services::email();
        $this->session = \Config\Services::session();
        if ($this->request->getPost()) 
        {
            $rules = [
                'newpassword' => [
                    'rules' => 'required|min_length[8]|max_length[20]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length[8]' => 'Password should be more than 5 characters',
                        'max_length[20]' => 'Password should not exceed 20 characters',
                    ],
                ],
                'renewpassword' => [
                    'rules' => 'required|matches[newpassword]',
                    'errors' => [
                        'required' => 'Password is required',
                        'matches[newpassword]' => 'Password should be identical',
                        ],
                ]
            ];

            if ($this->validate($rules)) 
            {
                $newpassword    = $this->request->getVar('newpassword');
                //$renewpassword  = $this->request->getVar('renewpassword');
               
                if (!empty($user_id)) 
                {
                    $userdata = $this->loginModel->verifyUserid($user_id);
                    
                    if($userdata)
                    {
                        if($this->loginModel->updatePassword($userdata->user_id ,$newpassword))
                        {
                            $this->session->setFlashdata('success', 'Password successfully changed.');
                            return redirect()->to('/');
                        }
                    }
                    else
                    {
                        $this->session->setFlashdata('error', 'Account not yet activated, please ensure to activate first.');
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $this->session->setFlashdata('error', 'Account does not exist, ensure to provide correct credentials.');
                        return redirect()->to(current_url());
                }
                $data['validation'] = $this->validator;
            }
         
        }   
        return view('auth/passwordReset', $data);
    }
   
}