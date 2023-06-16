<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\loginModel;
use App\Models\adminModel;
use App\Models\MemberRegModel;
use App\Models\onboardModel;

class AccDashboard extends BaseController
{
    public $session;
    public function userdash()
        {
            $loginModel = new loginModel;
            $onboardModel = new onboardModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->find($loggedInUserid);
            $account = $loginModel->verifyUser($loggedInUserid);
            //$onboard = $onboardModel->getUsers($loggedInUserid['user_id']);

            $data = [
                'title'     => 'Dashboard',
                'userdata'  => $userdata,
                'acc'    => $account
            ];
            return View("dashboard/userDashboard", $data);
        }   
    public function logout()
    {
            // Destroy session data to log out user
        $session = session();
        $this->session->setTempdata('success', 'You have logged out successfully.',3);
        $this->session->remove('loggedInUser');
        //$this->session->remove('loggedIn', true);
        $session->destroy();
        return view("auth/login");
    }

    public function adminDash()
    {
        $adminModel = new adminModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $adminModel->find($loggedInUserid);
            $account = $adminModel->verifyEmail($loggedInUserid['email']);
            
            $data = [
                'title'     => 'Dashboard',
                'userdata'  => $userdata,
                'acc'    => $account
            ];
        return view("dashboard/adminDashboard", $data);
    }

    public function profDash()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $memberRegModel = new MemberRegModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->find($loggedInUserid);
            $account = $loginModel->verifyUser($loggedInUserid);
            var_dump($account);
            
        
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($onboarding_completed);
            //var_dump($acc_board);

            $data = [
                'title'     => 'Dashboard',
                'userdata'  => $userdata,
                'usob'      => $userOn_board,
                'acc'       => $account,
                'acc_board' => $acc_board
            ];

        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $this->session = \Config\Services::session();

        if($this->request->getPost())
        {
            $rules = [
                'address' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'=>'Address is required',
                        'alpha_numeric_space'=>'Address name can only be of alphanumerics and space'
                    ],
                ],
                // 'practice_area' =>[
                //     'rules'=>'required',
                //     'errors'=> [
                //         'required'=>'Choose your practice areas.',
                //     ],
                // ],
                'company' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'             => 'Company name is required.',
                        'alpha_numeric_space'  => 'Company name can only be of alphanumerics and space'
                    ],
                ],
                'position' =>[
                    'rules'=>'required|alpha_space',
                    'errors'=> [
                        'required'      => 'Company name is required.',
                        'alpha_space'   => 'Company name can only be of alphabets and space'
                    ],
                ]
            ];
            if($this->validate($rules))
            {
                $user_id = $loggedInUserid['user_id'];
                $userdata = [
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    //'Photo' => $this->request->getVar('photo'),
                ];
                $udata = [
                    'FirstName' => $this->request->getVar('fname'),
                    'LastName' => $this->request->getVar('lname'),
                    'Tel' => $this->request->getVar('phone'),
                    'Email' => $this->request->getVar('email'),
                    'Photo' => $this->request->getVar('photo'),
                ]; 

                $pwd = [
                    'Password' => $this->request->getVar('newpassword'),
                ];
                $update     = $memberRegModel->updateUser($user_id, $udata);
                $updateMEMB = $onboardModel->updateUser($user_id, $userdata);
                $updatePwd  = $memberRegModel->updatePassword($user_id, $pwd);
                if($update && $updateMEMB)// Update user's information in the database
                {
                    if($this->session->get('loggedInUser'))
                    {
                    $this->session->setFlashdata('success', 'User Profile details updated successfully.');
                    return redirect()->to('userprofile');
                    }
                } 
                else
                {
                    $this->session->setFlashdata('error', 'Updating user details failed, try again with all information provided.');
                    return redirect()->to('userprofile'); 
                } 
                
                if($updatePwd)
                {
                    if($this->session->get('loggedInUser'))
                    {
                    $this->session->setFlashdata('success', 'Password updated successfully.');
                    return redirect()->to('userprofile');
                    }
                }
                else
                {
                    $this->session->setFlashdata('error', 'Updating password failed.');
                    return redirect()->to('userprofile');
                }
            }
            else
            {
                $vdata['validation'] = $this->validator;
            }
        }

        return view("dashboard/profile", [$data, $vdata]);
    }

    public function onboarding()
    {
        $loginModel   = new loginModel;
            $loggedInUserid = session()->get('loggedInUser');            
            $userdata = $loginModel->find($loggedInUserid);            
            $account = $loginModel->verifyUser($loggedInUserid);            

        $onboardModel = new onboardModel;
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
            //var_dump($acc_board);

            $data = [
                'title'     => 'After-Onboarding',
                'userdata'  => $userdata,
                'userOn_board'=> $userOn_board,
                'acc'    => $account,
                'acc_board' => $acc_board
            ];

        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $this->session = \Config\Services::session();
        
        if($this->request->getPost())
        {
            $rules = [
                'region' =>[
                    'rules'=> 'required',
                    'errors'=> [
                        'required'=>'Region is required',
                    ]
                ],
                'state' =>[
                    'rules'=> 'required|alpha_space',
                    'errors'=> [
                        'required'=>'State name is required',
                        'alpha_space'=>'Name can only be of alphabets'
                    ]
                ],
                'city' =>[
                    'rules'=> 'required|alpha_space',
                    'errors'=> [
                        'required'=>'City name is required',
                        'alpha_space'=>'City name can only be of alphabets'
                    ]
                ],
                'address' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'=>'Address is required',
                        'alpha_numeric_space'=>'Address name can only be of alphanumerics and space'
                    ],
                ],
                'practice_area' =>[
                    'rules'=>'required',
                    'errors'=> [
                        'required'=>'Choose your practice areas.',
                    ],
                ],
                'company' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'             => 'Company name is required.',
                        'alpha_numeric_space'  => 'Company name can only be of alphanumerics and space'
                    ],
                ],
                'position' =>[
                    'rules'=>'required|alpha_space',
                    'errors'=> [
                        'required'      => 'Company name is required.',
                        'alpha_space'   => 'Company name can only be of alphabets and space'
                    ],
                ]
                //'photo'   =>[
                //    'rules'=>'max_dims[photo,500,500]|is_image[photo,jpg,png,gif]',
                //    'errors'=> [
                //        'max_dims[photo,500,500]'=>'Photo/Logo size is exceeding limit',
                //        'is_image[photo,jpg,png,gif]'=>'File uploaded should be of jpg,png,gif'
                //    ],
                //]
            ];
            if($this->validate($rules))
            {
                $user_id = $account['user_id'];
                $userdata = [
                    'Region' => $this->request->getVar('region'),
                    'State' => $this->request->getVar('state'),
                    'City' => $this->request->getVar('city'),
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    'Practice_area' => $this->request->getVar('practice_area'),
                    'Photo' => $this->request->getVar('photo'),
                    'user_id' => $user_id,
                    'activation_date' => date("Y-m-d h:i:s")
                ];

                $onBoard = $onboardModel->createUser($userdata);
                if($onBoard)// Update user's onboarding information in the database
                {
                    $this->session->set('onboarding_completed', $userdata['user_id']);
                    if($this->session->get('loggedInUser'))
                    {
                    $this->session->setFlashdata('success', 'Account setup successful, please await a notification to access the dashboard.');
                    return redirect()->to('userprofile');
                    }
                } 
                else
                {
                    $this->session->setFlashdata('error', 'Account setup failed, contact admin!.');
                    return redirect()->to('/'); 
                }
            }
            else
            {
                $vdata['validation'] = $this->validator;
            }
        }

        return view("auth/onboarding", [$data, $vdata]);
    }

    public function forum()
    {
        $adminModel = new adminModel;
        $loggedInUserid = session()->get('loggedInUser');
        $userdata = $adminModel->find($loggedInUserid);
        $account = $adminModel->getEmail($loggedInUserid['email']);
        
        $data = [
            'title'     => 'Dashboard',
            'userdata'  => $userdata,
            'acc'    => $account
        ];
        return view("dashboard/adminForum", $data);
    }
}