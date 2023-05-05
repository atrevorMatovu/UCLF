<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use CodeIgniter\I18n\Time;

class Login extends BaseController
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
        
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
       //$request = \Config\Services::request();
    }
    public function login()
    {
        $data = [];
        $data['validation'] = null;
        $email = \Config\Services::email();
        $this->session = \Config\Services::session();
        if ($this->request->getPost()) {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Ensure email is added',
                        'valid_email' => 'Enter valid email address',
                        
                    ],
                ],
                'password' => [
                    'rules' => 'required|min_length[8]|max_length[20]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length[8]' => 'Password should be more than 5 characters',
                        'max_length[20]' => 'Password should not exceed 20 characters',
                    ],
                ]
            ];

            if ($this->validate($rules)) 
            {
                //$request = \Config\Services::request();
               
                    $Email  = $this->request->getVar('email');
                    $Password  = $this->request->getVar('password');
                
                

                $userdata = $this->loginModel->verifyEmail($Email);
                //var_dump($userdata);
                if ($userdata) 
                    //User is authenticated and active, set session data and redirect to dashboard 
                {
                    if(password_verify($Password, $userdata['Password']))
                    {
                        if($userdata['Account_status'] == 'Pending')
                        {
                            $this->session->set('logged_user', $userdata['user_id']);
                            session()->setFlashdata('success', 'Welcome aboard the UCLF experience.');
                            return redirect()->to('dashboard');
                        }
                        else if($userdata['Account_status'] == 'Approved')
                        {
                            $this->session->set('logged_user', $userdata['user_id']);
                            session()->setFlashdata('success', 'Welcome aboard the UCLF experience.');
                            return redirect()->to('dashboard');
                        }
                        else{
                            session()->setFlashdata('error', 'Please activate your account. Contact Admin');
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        session()->setFlashdata('error', 'Sorry! Wrong password entered.');
                        return redirect()->to(current_url());
                    }
                } 
                else 
                {
                    // Authentication failed, redirect to login page with error message
                    session()->setFlashdata('error', 'Sorry! Email does not exist.');
                    return redirect()->to(current_url());
                }
            }
            else 
            {
                // Validation failed, redirect to login page with errors
                $data['validation'] = $this->validator;
            }
            
        }
        return View("auth/login", $data);
    }

    public function logout()
    {
        // Destroy session data to log out user
        $session = session();
        $this->session->setTempdata('success', 'You have logged out successfully.',3);
        $session->destroy();
        return view("auth/login");
    }

    public function forgotPwd(){
        $data = [];
        $email = \Config\Services::email();
        if($this->request->getPost()){
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email|is_not_unique[members.Email]',
                    'errors' => [
                        'required' => 'Ensure email is added',
                        'valid_email' => 'Enter valid email address',
                    ],
                ],

            ];
            if($this->validate($rules)){
                $Email = ['Email' => $this->request->getVar('email',FILTER_SANITIZE_EMAIL)];
                $userdata = $this->loginModel->verifyEmail($Email);
                var_dump($Email);
                if($userdata)
                {
                    if($this->loginModel->updateAt($userdata->user_id))
                    {
                        $token = $userdata->user_id;
                        $message = 'Hi '.$userdata['fname, lname'].'<br><br>'
                                    . 'Your change password request has been received. Please click'
                                    . 'the link below to reset your password.<br><br>'
                                    . '<a href= "'.base_url().'pwdReset/'.$token.'">Click here to reset password</a><br><br>'
                                    . 'Regards,<br>UCLF-Team.';
                        
                        
                        $email->setTo($Email);
                        $email->setFrom('matovu@lwegatech.info');
                        $email->setSubject('Change Password Link');
                        $email->setMessage($message);
                        $filepath = 'public/assets/img/logo-rmbg.png';
                        $email->attach($filepath);
                        //$email->send();
                        
                        if($email->send())
                        {
                            $this->session->setTempdata('success', 'Reset password link sent to your email address', 3);
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error','Sorry! Unable to update, try again.', 3);
                        return redirect()->to(current_url());
                    }
                }else{
                    $this->session->setTempdata('error','Email does not exist', 3);
                    return redirect()->to(current_url());
                }

            }else{
                $data['validation']=$this->validator;

            }

        }
        return View("auth/forgotpwdView", $data);
    }
}
