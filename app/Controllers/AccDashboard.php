<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\loginModel;

class AccDashboard extends BaseController
{
    public $session;
    public function userdash()
        {
            $loginModel = new loginModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->find($loggedInUserid);
            //$userId = session()->get('user_id');
            $account = $loginModel->verifyEmail($loggedInUserid['Email']);
            //var_dump($accountStatus);


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
        $this->session->setTempdata('success', 'You have logged out successfully.');
        $this->session->remove('loggedInUser');
        $this->session->remove('loggedIn', true);
        $session->destroy();
        return view("auth/login");
    }

    public function adminDash()
    {
        return view("dashboard/adminDashboard");
    }

    public function profDash()
    {
        $loginModel = new loginModel;
            $loggedInUserid = session()->get('loggedInUser');
            $userdata = $loginModel->find($loggedInUserid);
            $account = $loginModel->verifyEmail($loggedInUserid['Email']);

            $data = [
                'title'     => 'Dashboard',
                'userdata'  => $userdata,
                'acc'    => $account
            ];
        return view("dashboard/profile", $data);
    }

    public function show()
    {

    }
}