<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function new()
    {
        return view('Register/new');
    }

    public function create()
    {
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel;
        if($model->insert($user)){
          return redirect()->to("Register/success");
        } else{
          return redirect()->back()
                            ->with('errors', $model->errors())
                            ->with('warning', 'Invalid data')
                            ->withInput();
        }
    }

    public function success(){

      return view("Register/success");

  }
}
