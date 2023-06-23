<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface 
{
    public function before(RequestInterface $request, $params = null) 
    {
        // Check if the user has admin permissions
        $userService = Services::userService();
        if(!(session()->has('loggedInUser'))) 
        {
            session()->setFlashdata('error', 'Access denied! If you persist, your logins will be flagged.');
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
    {
        ;
    }


}