<?php

namespace App\Libraries;

class Authentication{
  public function login($username, $password){
    $model = new \App\Models\UserModel;
        $user = $model->where('username', $username)
                      ->first();

        if($user === null){
          return false;
        }

        if(!password_verify($password, $user->password_hash)){
          return false;
        }

        $session = session();
        $session->regenerate();
        $session->set('user_id', $user->id);
        $session->set('username', $user->username);

        return true;
  }
}