<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\adminModel;
use App\Models\MemberRegModel;
use App\Models\OnboardModel;
use App\Models\UnotifyModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\CLIRequest;

class AccDashboard extends BaseController
{
    public $session;
    public $onboardModel;
    public $loginModel;
    public $unotifyModel;
    public function __construct(){
        $this->loginModel = new LoginModel();
    }
    public function userdash()
        {
            $loginModel = new loginModel;
            $onboardModel = new onboardModel;
            $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            
            //var_dump( $loggedInUserid);
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            
            $data = [
                'title'     => 'UserDashboard',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount
            ];
            return View("dashboard/userDashboard", $data);
        }   
    public function logout()
    {
    // Destroy session data to log out user
        $session = session();
        $session->setFlashdata('success', 'You have logged out successfully.');
        $session->remove('loggedInUser');
        $session->destroy();
        return view("auth/login");
    }    
    public function adminDash()
    {
        $adminModel = new adminModel;
        $loginModel = new loginModel;
        $onboardModel = new OnboardModel;
            $loggedInUserid = session()->get('loggedInUser');
            $users = $loginModel->findAll();
            $account = $adminModel->verifyEmail($loggedInUserid['email']);
            //$memberCounts = $loginModel->getMemberCountsByMembershipType();
            //$members = $loginModel->getTotalMembers();
            //var_dump($members);
            $notification = $this->notifyAdmin();     

            $data = [
                'title'     => 'Dashboard',
                'users'  => $users,
                'userdata'    => $account,
                'noty'      => $notification
                //'memberCounts'=> $memberCounts,
            ];
        return view("adminDashboards/adminDashboard", $data);
    }
    public function adminProf()
    {
        $adminModel = new adminModel;
        $loginModel = new loginModel;
            $loggedInUserid = session()->get('loggedInUser');
           $account = $adminModel->verifyEmail($loggedInUserid['email']);
            //$memberCounts = $loginModel->getMemberCountsByMembershipType();
            //$members = $loginModel->getTotalMembers();        

            $data = [
                'title'     => 'Dashboard',
                'userdata'    => $account
            ];
        return view('adminDashboards/adminProf', $data);
    }

    public function profDash()
    {
        $loginModel = new loginModel;
        $memberRegModel = new MemberRegModel;
        $unotifyModel   = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            

            $data = [
                'title'     => 'UserProfile',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount
            ];     

        return view("dashboard/profile", $data);
    }

    public function updateUser()
    {
        $user_id = $this->request->getVar('id');
        $loginModel = new loginModel();
        $unotifyModel = new UnotifyModel();
        $memberRegModel = new MemberRegModel;
        $userdata = $this->loginModel->verifyUser($user_id);
        //var_dump($data['userdata']);
        $notifCount = $unotifyModel->count_unread_notifications($user_id);
        $notif    = $unotifyModel->fetchNotif($user_id);
            
        $data = [
            'userdata' => $userdata,
            'notCount' => $notifCount,
            'notif'    => $notif
        ];
        $data['validation'] = null;

        $email = \Config\Services::email();
        
        
        $this->session = \Config\Services::session();
        
        
            $rules = [
                'address' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'=>'Address is required',
                        'alpha_numeric_space'=>'Address name can only be of alphanumerics and space'
                    ],
                ],
               'company' =>[
                    'rules'=>'required',
                    'errors'=> [
                        'required'             => 'Company name is required.',
                        
                    ],
                ],
                'position' =>[
                    'rules'=>'required|alpha_space',
                    'errors'=> [
                        'required'      => 'Company name is required.',
                        'alpha_space'   => 'Company name can only be of alphabets and space'
                    ],
                ],
                
            ];
            // $photoRules = [
            //     'rules'=>'uploaded[avatar]|ext_in[avatar,png,jpg,jpeg,gif]|max_size[avatar,4096]',
            //     'errors'=> [
            //         'uploaded[avatar]'=>'Photo is required.',
            //         'ext_in[avatar,png,jpg,jpeg,gif]'=>'File uploaded should be of jpg,png,gif',
            //         'max_size[avatar,4096]' => 'Photo should not exceed 5MBs.'
            //     ],
            // ];

            if($this->validate($rules) )
            {
                
                //var_dump($user_id);
                $avatar = $this->request->getFile('photo');
                //var_dump($avatar);
                if ($avatar) {
                    if ($avatar->isValid() && !$avatar->hasMoved()) {
                        $newName = $avatar->getRandomName();
                        $avatar->move(ROOTPATH . 'public/uploads', $newName);
                        $data = $newName;
                        $memberRegModel->updatePhoto($user_id, $data );
                    }

                    
                 }
                 $udata = [
                    'FirstName' => $this->request->getVar('fname'),
                    'LastName' => $this->request->getVar('lname'),
                    'Tel' => $this->request->getVar('phone'),
                    'Email' => $this->request->getVar('email'),
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    //'Photo' => $avatar,
                ];
                
                $msg = 'Account profile details updated successfully.';
                
                $mdata = [
                    'msg' => $msg,
                    'user_id' => $user_id
                ];


                // Update user's information in the database
                $update     = $memberRegModel->updateUser($user_id, $udata); 
                $notify     = $unotifyModel->saveNotif($mdata);
               if($update)
                {
                    if($notify)
                    {
                        if($this->session->get('loggedInUser'))
                        {
                        
                            session()->setFlashdata('success', 'User Profile details updated successfully.');
                            return redirect()->to('userprofile');
                        }
                    }
                } 
                else
                {
                    session()->setFlashdata('error', 'Updating user details failed, try again with all required information provided.');
                    return redirect()->to(current_url()); 
                }                       
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        //}
        return view("dashboard/profile",  $data);
    }
    
     
    public function updatePwd()
    {
        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $memberRegModel = new MemberRegModel;
        $unotifyModel = new UnotifyModel();
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

                $msg = 'Account password updated successfully.';
                
                $mdata = [
                    'msg' => $msg,
                    'user_id' => $user_id
                ];

                $updatePwd  = $memberRegModel->updatePassword($user_id, $pwd);
                $notify     = $unotifyModel->saveNotif($mdata);
                if($updatePwd)
                {
                    if($notify)
                    {
                        if($this->session->get('loggedInUser'))
                        {
                        $this->session->setFlashdata('success', 'Password updated successfully.');
                        return redirect()->to('userprofile');
                        }
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
        return view("dashboard/profile", $vdata);
    }
    public function notification()
    {
        $loginModel = new loginModel;
        $memberRegModel = new MemberRegModel;
        $unotifyModel   = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $id = $this->request->getVar('statusID');
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            $noti = $unotifyModel->updateStati($loggedInUserid, $id);
            $this->session = \Config\Services::session();
            $read = $unotifyModel->readAll($loggedInUserid);

            $data = [
                'title'     => 'UserNotifications',
                'userdata'  => $userdata,
                'notif'     => $notif,
                'notCount'  => $notifCount,
                //'read'      => $read
            ];  
            
           

        return view("dashboard/usernotifications", $data);   
    }
    public function markAsRead()
    {
        $unotifyModel = new UnotifyModel;
        $loginModel = new loginModel;
        $memberRegModel = new MemberRegModel;
        $user_id = session()->get('loggedInUser');

        $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $notif    = $unotifyModel->fetchNotif($loggedInUserid);
            $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
            $this->session = \Config\Services::session();
       
            $read = $unotifyModel->readAll($loggedInUserid);
        
        $data = [
            'title'     => 'UserNotifications',
            'userdata'  => $userdata,
            'notif'     => $notif,
            'notCount'  => $notifCount,
            'read'      => $read
        ];  

        
        var_dump($read);
        if ($read)
        {
            session()->setFlashdata('success','All read.');
        }else{
            session()->setFlashdata('error', 'Failed');
        }

        return view("dashboard/usernotifications", $data); 

    }
    public function updateStatu()
    {
        $unotifyModel = new UnotifyModel;
        $statusID = $this->request->getVar('statusID');
        $user_id = session()->get('loggedInUser');
        $unotifyModel->updateStati($user_id, $statusID); 
        return redirect()->to('userprofile');       
    }
    public function markAsUnread()
    {
        $unotifyModel = new UnotifyModel;
        $statusID = $this->request->getVar('statusID');
        $user_id = session()->get('loggedInUser');
        $unotifyModel->updateStati($user_id, $statusID); 
        return redirect()->to('');
    }
    public function getNotificationCount()
    {
        $unotifyModel = new UnotifyModel;
        // For example, you can count the number of unread notifications for the current user.
        $user_id = session()->get('loggedInUser');
        // You can use CodeIgniter's Model to interact with the database.
        $notificationCount = $unotifyModel->count_unread_notifications($user_id);

        // Return the notification count as JSON
        return $this->response->setJSON(['count' => $notificationCount]);
    }
    public function fetchRealtimeNotifications()
    {
        $unotifyModel = new UnotifyModel;
        // For example, you can fetch notifications with a creation date greater than the last fetched notification's timestamp.
        $user_id = session()->get('loggedInUser');
        $lastStamp = date('Y-m-d H:i:s', strtotime('-48 hours'));
        // You can use CodeIgniter's Model to interact with the database.
        $notifications = $unotifyModel->fetchNewNotifications($user_id, $lastStamp);

        // Return the new notifications as JSON
        return $this->response->setJSON($notifications);
    }
    public function updateAdmin()
    {
        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $adminModel = new AdminModel();
        $this->session = \Config\Services::session();

        if($this->request->getPost())
        {
            $rules = [
                'phone' =>[
                    'rules'=>'required|numeric',
                    'errors'=> [
                        'required'=>'Phone number is required',
                        'numeric'=>'Address name can only be of numeric digits'
                    ],
                ],
                
                'email' =>[
                    'rules'=>'required|alpha_numeric_space',
                    'errors'=> [
                        'required'             => 'Email is required.',
                        'alpha_numeric_space'  => 'Email can only be of alphanumerics and space'
                    ],
                ],
                'position' =>[
                    'rules'=>'required|alpha_space',
                    'errors'=> [
                        'required'      => 'Position in company is required.',
                        'alpha_space'   => 'Position name can only be of alphabets and space'
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
                $user_id = $this->session->get('loggedInUser');
                $email = $user_id['email'];
                $avatar = $this->request->getFile('photo');
                //var_dump($user_id);
                if ($avatar) {
                    if ($avatar->isValid() && !$avatar->hasMoved()) {
                        $newName = $avatar->getRandomName();
                        $avatar->move(ROOTPATH . 'public/uploads', $newName);
                        $userdata['photo'] = $newName;
                    }
                }
                $userdata = [
                    //'Address' => $this->request->getVar('address'),
                    'position' => $this->request->getVar('position'),
                    'photo' => $avatar,
                    'username' => $this->request->getVar('uname'),
                    'Tel' => $this->request->getVar('phone'),
                    'email' => $this->request->getVar('email')
                ]; 

                
                $update     = $adminModel->updateAdmin($email, $userdata);
               if($update )// Update user's information in the database
                {
                    $this->session->setFlashdata('success', 'Profile details updated successfully.');
                    return redirect()->to('adminProfile');
                } 
                else
                {
                    $this->session->setFlashdata('error', 'Updating profile details failed, try again with all required information provided.');
                    return redirect()->to(current_url()); 
                }               
                
            }
            else
            {
                $vdata['validation'] = $this->validator;
            }
        }
        return view("adminDashboards/adminProf",  $vdata);
    }

    public function adminupdatePwd()
    {
        $vdata = [];
        $vdata['validation'] = null;
        $email = \Config\Services::email();
        $adminModel = new adminModel();
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
                $email = $user_id['email'];
            
                $pwd = [
                    'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT),
                ];
                $updatePwd  = $adminModel->updatePassword($email, $pwd);
                if($updatePwd)
                {
                    if($this->session->get('loggedInUser'))
                    {
                    $this->session->setFlashdata('success', 'Password updated successfully.');
                    return redirect()->to('adminProfile');
                    }
                }
                else
                {
                    $this->session->setFlashdata('error', 'Updating password failed.');
                    return redirect()->to('adminProfile');
                }
            }
            else
            {
                $vdata['validation'] = $this->validator;
            }


        }
        return view("adminDashboards/adminProf", $vdata);
    }
    public function notifyAdmin()
    {
        // Trigger a notification to the admin dashboard
    $notificationMessage = "New user completed onboarding";

    $this->session->setFlashdata('notification', $notificationMessage);
        //$this->session->setFlashdata('notification', $notificationMessage);
        return $this->response->setJSON(['success' => true]);
    }

    public function onboarding()
    {
        $data = [];
        $data['validation'] = null;
        $email = \Config\Services::email();
        $this->onboardModel = new OnboardModel();
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
                //'practice_area[]' =>[
                //    'rules'=>'required',
                //    'errors'=> [
                //        'required'=>'Choose your practice areas.',
                //    ],
                //],
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
                $user_id = $this->session->get('pending');
                $practice = implode(',', $_POST['practice_area']);
                $avatar = $this->request->getFile('avatar');                
                if ($avatar) 
                {
                    if ($avatar->isValid() && !$avatar->hasMoved()) 
                    {
                        $newName = $avatar->getRandomName();
                        $avatar->move(ROOTPATH . 'public/uploads', $newName);
                        //$userdata['Photo'] = $newName;
                        var_dump($newName);
                    }
                }
                $user = [
                    'Region' => $this->request->getVar('region'),
                    'State' => $this->request->getVar('state'),
                    'City' => $this->request->getVar('city'),
                    'Address' => $this->request->getVar('address'),
                    'Company' => $this->request->getVar('company'),
                    'Position' => $this->request->getVar('position'),
                    'Practice_area' => $practice,
                    'Photo' => $newName,
                    //'user_id' => $user_id,
                    //'activation_date' => date("Y-m-d h:i:s")
                ];
                //var_dump($user);                
                // Save user's onboarding information in the database
                if($this->onboardModel->updateUserInfo($user_id, $user))
                {
                    $this->session->set('onboarding_completed', $user_id);
                    if($this->session->get('pending'))
                    {
                    $this->session->setFlashdata('success', 'Account setup successful, please await an approval email to log into the system.');
                    return redirect()->to('/');
                   }
                    $this->notifyAdmin();
                } 
                else
                {
                    $this->session->setFlashdata('error', 'Account setup failed, contact admin!.');
                    return redirect()->to('/'); 
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view("auth/onboarding", $data);
    }

    public function userMgt()
    {
        $adminModel = new adminModel;
        $loginModel = new loginModel;
        $loggedInUserid = session()->get('loggedInUser');
    $account = null;
    $users = null;
    $singleUser = null;
     if (!empty($loggedInUserid)) {
        $account = $adminModel->getEmail($loggedInUserid['email']);
    }
        $user_id = $this->request->getPost('user_id');
    if (!empty($user_id)) {
        $singleUser = $loginModel->where('user_id', $user_id)->first();
    }
     $users = $loginModel->findAll();
        $data = [
        'title' => 'UserAccounts',
        'users' => $users,
        'userdata' => $account,
        'singleUser' => $singleUser
        ];
        return view("adminDashboards/adminUserMgt", $data);
    }
    /**USER REQUESTS FUNCTION THAT SHOWS USER INFO TO ADMIN FOR APPROVAL **/
    public function userReq()
    {
        $adminModel = new adminModel;
        $loginModel = new loginModel;
        $loggedInUserid = session()->get('loggedInUser');
        $account = $adminModel->getEmail($loggedInUserid['email']);
        $users  = $loginModel->findAll();

        $user_id = $this->request->getVar('user_id');
        var_dump($user_id);
        $singleUser = $loginModel->verifyUser($user_id);
        var_dump($singleUser);
        
        $data = [
            'title'       => 'ApprovalRequests',
            'users'       => $users,
            'userdata'    => $account,
            'singleUser'  => $singleUser
        ];
        return view("adminDashboards/adminUserReq", $data);
    }
    public function student()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
        
        $membership = 'student';
        $userdata1 = $loginModel->where('Membership_type',$membership)->findAll();
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
        
        $data = [
            'title'     => 'Dashboard',
            //'otherdata'  => $otherdata,
            'acc_board' => $acc_board,
            'userdata'  => $userdata,
            'userdata1' => $userdata1,
            'notif'     => $notif,
            'notCount'  => $notifCount
        ];
        return view("category/student", $data);
    }
   
    public function individual()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
        
        $membership = 'individual';
        $userdata1 = $loginModel->where('Membership_type',$membership)->findAll();
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
        
        $data = [
            'title'     => 'Dashboard',
            //'otherdata'  => $otherdata,
            'acc_board' => $acc_board,
            'userdata'  => $userdata,
            'userdata1' => $userdata1,
            'notif'     => $notif,
            'notCount'  => $notifCount
        ];
        return view("category/individual", $data);
    }

    public function life()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
        
        $membership = 'life';
        $userdata1 = $loginModel->where('Membership_type',$membership)->findAll();
        //var_dump($userdata1);
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);
        //$otherdata = $onboardModel->where('user_id',$onboarding_completed)->find('Position');
        
        
        $data = [
            'title'     => 'Dashboard',
            //'otherdata'  => $otherdata,
            'acc_board' => $acc_board,
            'userdata'  => $userdata,
            'userdata1' => $userdata1,
            'notif'     => $notif,
            'notCount'  => $notifCount
        ];
        return view("category/life", $data);
    }

    public function fship()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
        
        $membership = 'law-fellowship';
        $userdata1 = $loginModel->where('Membership_type',$membership)->findAll();
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);//var_dump($userdata1);
        //$otherdata = $onboardModel->where('user_id',$onboarding_completed)->find('Position');        
        $data = [
            'title'     => 'Dashboard',
            'acc_board' => $acc_board,
            'userdata'  => $userdata,
            'userdata1' => $userdata1,
            'notif'     => $notif,
            'notCount'  => $notifCount
        ];
        return view("category/fship", $data);
    }

    public function institutional()
    {
        $loginModel = new loginModel;
        $onboardModel = new onboardModel;
        $unotifyModel = new UnotifyModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->where('user_id',$loggedInUserid)->first();
            $account = $loginModel->verifyUser($loggedInUserid);
            
            $onboarding_completed = session()->get('onboarding_completed');
            $userOn_board = $onboardModel->find($onboarding_completed);
            $acc_board = $onboardModel->getUsers($loggedInUserid);
        
        $membership = 'institutional';
        $userdata1 = $loginModel->where('Membership_type',$membership)->findAll();
        $notif    = $unotifyModel->fetchNotif($loggedInUserid);
        $notifCount = $unotifyModel->count_unread_notifications($loggedInUserid);//var_dump($userdata1);
        //$otherdata = $onboardModel->where('user_id',$onboarding_completed)->find('Position');
        
        
        $data = [
            'title'     => 'Dashboard',
            'acc_board' => $acc_board,
            'userdata'  => $userdata,
            'userdata1' => $userdata1,
            'notif'     => $notif,
            'notCount'  => $notifCount
        ];
        return view("category/institutional", $data);
    }

    /**
     * ADMIN
     */
    public function addMember()
    {
        $adminModel = new adminModel;
        $loginModel = new loginModel;
        $loggedInUserid = session()->get('loggedInUser');
        //$userdata = $adminModel->find($loggedInUserid);
        $account = $adminModel->getEmail($loggedInUserid['email']);
        $users  = $loginModel->findAll();
        
        $data = [
            'title'     => 'Dashboard',
            'users'  => $users,
            'userdata'    => $account
        ];
        return view("adminDashboards/adminAddUser", $data);
    }
    public function addStaff()
    {
        $adminModel = new adminModel;
        $loggedInUserid = session()->get('loggedInUser');
        var_dump($loggedInUserid);
        //$userdata = $adminModel->find($loggedInUserid);
        $account = $adminModel->verifyEmail($loggedInUserid['email']);
        //var_dump($account);
        
        $data = [
            'title'     => 'Dashboard',
            'admin'    => $loggedInUserid,
            'userdata' => $account
        ];
        return view("adminDashboards/adminStaff");  
    }

    //User Account Status Update by Admin
    public function statusToggle()
    {
        $loginModel = new loginModel();
        $userId = $this->request->getPost('user_id');
        $status = $this->request->getPost('status');

        // Perform necessary validation and authentication checks

        // Update the account status in the database
        $Status_update = $loginModel->updateAccountStatus($userId, $status);
        if($Status_update)
        {
            $this->session->setFlashdata('success', 'User Account status updated successfully.');
            return redirect()->to('users');
        }
    }


}