<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\loginModel;

class AccDashboard extends BaseController{
public function userdash()
    {
        $loginModel = new loginModel;
        $loggedInUserid = session()->get('loggedInUser');
        $userdata = $loginModel->find($loggedInUserid);

        $data = [
            'title'     => 'Dashboard',
            'userdata'  => $userdata,
        ];
        return View("dashboard/userDashboard", $data);
    }
}