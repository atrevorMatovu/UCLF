<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\OnboardModel;
use App\Models\AdminModel;
use CodeIgniter\Session\Session;
use CodeIgniter\I18n\Time;

class Login extends BaseController
{
    public $loginModel;
    public $onboardModel;
    public $adminModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        helper('time');
        $db = db_connect();
        
        $this->loginModel = new LoginModel();
        $this->adminModel = new AdminModel();
        $this->onboardModel = new OnboardModel();
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
        if ($this->request->getPost()) 
        {
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
                $admin = $this->adminModel->verifyEmail($Email);
                $rememberMe = $this->request->getVar('remember') === 'on';

                if ($admin)
                {
                    $pwd = $this->adminModel->verifyPassword($Password);
                    if ($pwd)
                    {
                        $this->session->set('loggedInUser', $admin);
                        session()->setFlashdata('success', 'Welcome our esteemed UCLF Administrator, ' . $admin['username']);
                        return redirect()->to('admin');

                        if ($rememberMe) {
                            // Generate a remember token
                            $rememberToken = bin2hex(random_bytes(32));
        
                            // Set the remember token in the user's browser cookie
                            $this->response->setCookie('rememberToken', $rememberToken, 2592000); // Expires in 30 days
        
                            // Save the remember token in the user's data or database
                            // Example: $this->userModel->saveRememberToken($userdata['id'], $rememberToken);
                        }
                    }
                }

                if ($userdata) 
                //User is authenticated and active, set session data and redirect to dashboard 
                {
                    if(password_verify($Password, $userdata['Password']))
                    {
                        if($userdata['Account_status'] == 'Pending')
                        {/**while Account_status is 'Pending'
                            redirect to onboard page */
                            $this->session->set('loggedInUser', $userdata['user_id']);

                            /**Matching the user_id(onboarding) with the signup(user_id)*/
                            $has_onboarded = $this->onboardModel->getUsers($userdata['user_id']);
                            $notOnboard    = $this->session->get('onboarding_completed');
                            if($has_onboarded['user_id'] || $notOnboard)
                            {
                                session()->setFlashdata('success', 'Welcome aboard the UCLF experience ' .$userdata['FirstName'].' '.$userdata['LastName']);
                                return redirect()->to('userprofile');
                            }
                            else
                            {
                                session()->setFlashdata('success', 'Welcome '.$userdata['FirstName'].', kindly proceed to setup your account.');
                                return redirect()->to('onboard');
                            }
                            if ($rememberMe) {
                                // Generate a remember token
                                $rememberToken = bin2hex(random_bytes(32));
            
                                // Set the remember token in the user's browser cookie
                                $this->response->setCookie('rememberToken', $rememberToken, 2592000); // Expires in 30 days
            
                                // Save the remember token in the user's data or database
                                // Example: $this->userModel->saveRememberToken($userdata['id'], $rememberToken);
                            }
                            
                        }
                        else if($userdata['Account_status'] == 'Approved')
                        {
                            $this->session->set('loggedInUser', $userdata);
                            session()->setFlashdata('success', 'Welcome aboard the UCLF experience '.$userdata['FirstName']);
                            return redirect()->to('dashboard');

                            if ($rememberMe) {
                                // Generate a remember token
                                $rememberToken = bin2hex(random_bytes(32));
            
                                // Set the remember token in the user's browser cookie
                                $this->response->setCookie('rememberToken', $rememberToken, 2592000); // Expires in 30 days
            
                                // Save the remember token in the user's data or database
                                // Example: $this->userModel->saveRememberToken($userdata['id'], $rememberToken);
                            }
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
                $Email = [
                    'Email' => $this->request->getVar('email',FILTER_SANITIZE_EMAIL)
                ];
                $userdata = $this->loginModel->verifyEmail($Email);
                //var_dump($Email);
                if($userdata)
                {
                    if($this->loginModel->updateAt($userdata['user_id']))
                    {
                        $token = $userdata['user_id'];
                        $message = 'Hi '.$userdata['FirstName'].'<br><br>'
                                    . 'Your change password request has been received. Please click'
                                    . 'the link below to reset your password.<br><br>'
                                    . '<a href= "'.base_url().'/pwdReset/'.$token.'">Click here to reset password</a><br><br>'
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
                            return redirect()->to('/');
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
