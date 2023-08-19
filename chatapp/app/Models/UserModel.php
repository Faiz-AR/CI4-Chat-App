<?php

namespace App\Models;

class UserModel extends \CodeIgniter\Model
{
  protected $table = 'user';
  protected $allowedFields = ['username', 'password', 'email', 'date_of_birth', 'gender', 'country'];

  protected $returnType = 'App\Entities\User';
  protected $useTimestamps = true;

  protected $validationRules = [
    'username' => 'required|is_unique[user.username]',
    'password' => 'required|min_length[6]',
    'email' => 'required|valid_email|is_unique[user.email]',
    'date_of_birth' => 'required',
    'gender' => 'required',
    'country' => 'required'
  ];

  protected $validationMessages = [
    'username' => [
      'is_unique' => "Username has already been taken"
    ],
    'email' => [
      'is_unique' => "Email address has already been taken"
    ],
    'date_of_birth' => [
      'required' => "The date of birth field is required"
    ]
  ];

  protected $beforeInsert = ['hashPassword'];

  protected function hashPassword(array $data){
    if(isset($data['data']['password'])){
      $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
      unset($data['data']['password']);
    }

    return $data;
  }

  public function getUserByUserId($id, $user_id){

    return $this->where('id', $id)
                ->where('user_id', $user_id)
                ->first();

  }
}