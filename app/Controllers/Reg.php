<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberRegModel;
use App\Models\LoginModel;
use CodeIgniter\I18n\Time;

class Reg extends BaseController
{
    public $memberRegModel;
    public $onboardModel;
    public $loginModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper(['form', 'html', 'date', 'time']);
        $db = db_connect(); 
        $this->memberRegModel = new MemberRegModel();
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }

    public function register()
    {
        $data = [];
        $data['validation'] = null;
        $email = \Config\Services::email();
        $this->session = \Config\Services::session();
        
        if($this->request->getPost())
        {
            $rules = [
                'fname' =>[
                    'rules'=> 'required|alpha_space',
                    'errors'=> [
                        'required'=>'Full name is required',
                        'alpha_space'=>'Name can only be of alphabets'
                    ]
                ],
                'lname' =>[
                    'rules'=> 'required|alpha_space',
                    'errors'=> [
                        'required'=>'Full name is required',
                        'alpha_space'=>'Name can only be of alphabets'
                    ]
                ],
                'email' =>[
                    'rules'=> 'required|valid_email|is_unique[members.email]',
                    'errors'=> [
                        'required'=> 'Ensure email is added',
                        'valid_email'=>'Enter valid email address',
                        'is_unique[members.email]'=>'Email already exists, please contact admin.'
                    ],
                ],
                'password' =>[
                    'rules'=>'required|min_length[8]|max_length[20]',
                    'errors'=> [
                        'required'=>'Password is required',
                        'min_length[5]'=>'Password should be more than 8 characters',
                        'max_length[20]'=>'Password should not exceed 20 characters',
                    ],
                ],
                'passwordConf' =>[
                    'rules'=>'required|min_length[8]|max_length[20]|matches[password]',
                    'errors'=> [
                        'required'=>'Password is required',
                        'min_length[5]'=>'Password should be more than 8 characters',
                        'max_length[20]'=>'Password should not exceed 20 characters',
                    ],
                ], 
                'membership-type' => [
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Membership type is necessary',
                    ],
                ], 
                'telephone' => [
                    'rules'=>'required|numeric|min_length[10]',
                    'errors'=>[
                        'required'=>'User contact is necessary',
                        'numeric'=>'Contact should be numeric',
                        'min_length'=>'Contact strictly of 10 digits',
                    ],
                ],
                'gender' =>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Gender is necessary',
                    ],
                ],  
            ]; 
            if($this->validate($rules))
            {
                $user_id = md5(str_shuffle('uclf'.time()));
                $status = 'inactive';
                $userdata = [
                    'FirstName' => $this->request->getVar('fname'),
                    'LastName' => $this->request->getVar('lname'),
                    'Email' => $this->request->getVar('email'),
                    'Password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'Membership_type'=> $this->request->getVar('membership-type'),
                    'Tel' => $this->request->getVar('telephone'),
                    'Gender' => $this->request->getVar('gender'),
                    'Account_status' => $status,
                    'user_id' => $user_id,
                    'activation_date' => date("Y-m-d h:i:s")
                ]; 
                if($this->memberRegModel->createUser($userdata))
                {
                    $logo_path = 'public/assets/img/logo49x52.png';
                    $logo_data = file_get_contents($logo_path);

                    // Encode the logo data as a base64 string
                    $logo_base64 = base64_encode($logo_data);
                    $email->setTo($userdata['Email']);
                    $email->setFrom('matovu@lwegatech.info');
                    $email->setSubject('UCLF-MIS: Account Activation Link');
                    $email->setMessage('<img src="cid:company_logo" alt="Company Logo"><br>Hi '.' '.$userdata['FirstName'].' '.$userdata['LastName']."<br><br>Thanks, Your account has been created successfully. Please click the link below to activate it<br><br>"."<a href='".base_url()."/register/activate/".$user_id."'>Activate Now</a><br><br><p>Regards!<br>UCLF-Support</br></p>");
                    $filepath = 'public/assets/img/logo-rmbg.png';
                    $email->attach($logo_path, 'inline', 'company_logo', 'image/png');
                    //$email->send();
                  
                    if($email->send())
                    {
                        $this->session->setTempdata('success','Account creation successsful. Please activate the account via your email address within the next 24hours!', 2);
                        return redirect()->to('/');
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Sorry, failed to send activation link. Contact Admin', 2);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $this->session->setTempdata('error', 'Sorry, failed to register. Try again', 3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("auth/registration", $data);
    }


    public function activate($user_id = null)
    {
        
        if (!empty($user_id)) {
            $userdata = $this->memberRegModel->verifyUserid($user_id);
            
            if ($userdata) {

                if ($this->actiLinkExpiry($userdata->id)) {
                    

                    if ($userdata->Account_status == 'Inactive') {
                        
                        $status = $this->memberRegModel->updateStatus($userdata->user_id);
                        if ($status) {
                            $this->session->setFlashdata('success', 'Account activated successfully, proceed to log in.');
                            return redirect()->to('acti');
                        }
                    } 
                    else 
                    {
                        $this->session->setFlashdata('success', 'Account already successfully activated, please proceed to login.');
                        return redirect()->to('acti');
                    }
                }
                    else
                    {
                        $this->session->setFlashdata('error', 'Activation link is expired, you are advised to get another one.');
                        return redirect()->to('/'); 
                    }
                   
                } 
                else 
                {
                    $this->session->setFlashdata('error', 'Sorry! something with the activation link. Please contact support.');
                    return redirect()->to('/');
                }
            }
            return view('auth/activation');
        }
    
      public function actiLinkExpiry($id = null)
      {
        $userdata = $this->memberRegModel->getUser($id);
        //var_dump($userdata);
        
        $currentTime = now(); //date('Y-m-d H:i:s')alternative_option
         //calculating and allocating activation link expiry time to 24hours   
        $expirationTime = strtotime($userdata->created_at) + (24 * 60 * 60);
        if($currentTime > $expirationTime)
        {
            return false;
        }
        else
        {
            return true;
        }

      }

      
}