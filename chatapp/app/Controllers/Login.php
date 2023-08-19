<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function new()
    {
        return view('Login/new');
    }

    public function create()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $auth = new \App\Libraries\Authentication;
        
        if($auth->login($username, $password)){

          return redirect()->to('/')
                            ->with('info', 'Login successful');

        } else {

          return redirect()->back()
                            ->withInput()
                            ->with('warning', "Invalid login");
  
        }
    }

    public function delete()
    {
        session()->destroy();
        return redirect()->to('/login/showLogoutMessage');
    }

    public function showLogoutMessage()
    {
        return redirect()->to('/')
                          ->with('info', 'Logout successful');
    }
}
