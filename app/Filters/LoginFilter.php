<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface 
{
    public function before(RequestInterface $request, $params = null) 
    {
        if(!(session()->has('loggedInUser'))) 
        {
            return redirect()->to(base_url().'/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
    {
        ;
    }


}