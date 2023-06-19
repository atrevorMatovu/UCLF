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
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            //$account = $loginModel->verifyUser($loggedInUserid);
            //$onboard = $onboardModel->getUsers($loggedInUserid['user_id']);

            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);

            $data = [
                'title'     => 'UserDashboard',
                //'userdata'  => $userdata,
                'userdata'  => $userdata,
                'acc_board' => $acc_board
            ];
            return View("dashboard/userDashboard", $data);
        }   
    public function logout()
    {
    // Destroy session data to log out user
        $session = session();
        $session->setFlashdata('success', 'You have logged out successfully.');
        $session->remove('loggedInUser');
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
                //'userdata'  => $userdata,
                'userdata'    => $account
            ];
        return view("dashboard/adminDashboard", $data);
    }

    public function profDash()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $memberRegModel = new MemberRegModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            //var_dump($account);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
            //var_dump($acc_board);

            $data = [
                'title'     => 'UserProfile',
                //'userdata'  => $userdata,
                'usob'      => $userOn_board,
                'userdata'  => $userdata,
                'acc_board' => $acc_board
            ];

        

        return view("dashboard/profile", $data);
    }

    public function updateUser()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $memberRegModel = new MemberRegModel;
            $loggedInUserid = session()->get('loggedInUser');
            //$userdata = $loginModel->find($loggedInUserid);
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();

            //$account = $loginModel->verifyUser($loggedInUserid);
            var_dump($userdata);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
            //var_dump($acc_board);

            $data = [
                'title'     => 'Dashboard',
                //'userdata'  => $userdata,
                'usob'      => $userOn_board,
                'userdata'       => $userdata,
                'acc_board' => $acc_board
            ];

        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $memberRegModel = new MemberRegModel;
        $onboardModel   = new onboardModel;
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
                ],
                'avatar'   =>[
                    'rules'=>'uploaded[avatar]|ext_in[avatar,png,jpg,jpeg,gif]|max_size[avatar,4096]',
                    'errors'=> [
                        'uploaded[avatar]'=>'Photo is required.',
                        'ext_in[avatar,png,jpg,jpeg,gif]'=>'File uploaded should be of jpg,png,gif',
                        'max_size[avatar,4096]' => 'Photo should not exceed 5MBs.'
                    ],
                ]
            ];
            if($this->validate($rules))
            {
                $user_id = $loggedInUserid;
                $userdata = [
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    //'Photo' => $this->request->getFile('avatar'),
                ];

                if ($avatar = $this->request->getFile('avatar')) {
                    if ($avatar->isValid() && !$avatar->hasMoved()) {
                        $newName = $avatar->getRandomName();
                        $avatar->move(ROOTPATH . 'public/uploads', $newName);
                        $userdata['Photo'] = $newName;
                    }
                }
                $udata = [
                    'FirstName' => $this->request->getVar('fname'),
                    'LastName' => $this->request->getVar('lname'),
                    'Tel' => $this->request->getVar('phone'),
                    'Email' => $this->request->getVar('email'),
                ]; 

                
                $update     = $memberRegModel->updateUser($user_id, $udata);
                $updateMEMB = $onboardModel->updateUser($user_id, $userdata);
                if($update && $updateMEMB)// Update user's information in the database
                {
                    //$this->session->set('loggedInUser', $user_id);
                    $this->session->setFlashdata('success', 'User Profile details updated successfully.');
                        return redirect()->to('updateprofile');
                } 
                else
                {
                        $this->session->setFlashdata('error', 'Updating user details failed, try again with all required information provided.');
                        return redirect()->to(current_url()); 
                }               
                
            }
            else
            {
                $vdata['validation'] = $this->validator;
            }
        }
        return view("dashboard/profile", [$data, $vdata]);
    }

    public function updatePwd()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $memberRegModel = new MemberRegModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->find($loggedInUserid);
            $account = $loginModel->verifyUser($loggedInUserid);
            //var_dump($account);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
            //var_dump($acc_board);

            $data = [
                'title'     => 'Dashboard',
                //'userdata'  => $userdata,
                'usob'      => $userOn_board,
                'userdata'       => $account,
                'acc_board' => $acc_board
            ];

        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $memberRegModel = new MemberRegModel;
        $this->session = \Config\Services::session();

        if($this->request->getPost())
        {
            $rules = [
                'password' =>[
                'rules'=>'required|min_length[8]|max_length[20]',
                'errors'=> [
                    'required'=>'Password is required',
                    'min_length[5]'=>'Password should be more than 8 characters',
                    'max_length[20]'=>'Password should not exceed 20 characters',
                ],
            ],
        ];
            if($this->validate($rules))
            {
                $user_id = $this->session->get('loggedInUser');
            
                $pwd = [
                    'Password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT),
                ];
                $updatePwd  = $memberRegModel->updatePassword($user_id, $pwd);
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
                //'userdata'  => $userdata,
                'userOn_board'=> $userOn_board,
                'userdata'    => $account,
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
                'practice_area[]' =>[
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
                ],
                'avatar'   =>[
                    'rules'=>'uploaded[avatar]|ext_in[avatar,png,jpg,jpeg,gif]|max_size[avatar,4096]',
                    'errors'=> [
                        'uploaded[avatar]'=>'Photo is required.',
                        'ext_in[avatar,png,jpg,jpeg,gif]'=>'File uploaded should be of jpg,png,gif',
                        'max_size[avatar,4096]' => 'Photo should not exceed 5MBs.'
                    ],
                ]
            ];
            if($this->validate($rules))
            {
                $user_id = $account['user_id'];
                $practice = implode(',', $_POST['practice_area']);
                $userdata = [
                    'Region' => $this->request->getVar('region'),
                    'State' => $this->request->getVar('state'),
                    'City' => $this->request->getVar('city'),
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    'Practice_area' => $practice,
                    //'Photo' => $this->request->getFile('avatar'),
                    'user_id' => $user_id,
                    'activation_date' => date("Y-m-d h:i:s")
                ];
                if ($avatar = $this->request->getFile('avatar')) {
                    if ($avatar->isValid() && !$avatar->hasMoved()) {
                        $newName = $avatar->getRandomName();
                        $avatar->move(ROOTPATH . 'public/uploads', $newName);
                        $userdata['Photo'] = $newName;
                    }
                }

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
            //'userdata'  => $userdata,
            'userdata'    => $account
        ];
        return view("dashboard/adminForum", $data);
    }
}