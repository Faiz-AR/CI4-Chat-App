<?php

namespace App\Controllers;

class User extends BaseController
{

    private $model;

    public function __construct()
    {
      $this->model = new \App\Models\UserModel;
    }

    public function show($id)
    {
      $user = $this->getUserOr404($id);

      return view("User/show", [
        'user' => $user
      ]);
    }

    public function edit($id)
    {
				$user = $this->getUserOr404($id);


        return view("User/edit", [
          'user' => $user
        ]);
    }

     public function update($id)
    {

				$user = $this->getUserOr404($id);

				$post = $this->request->getPost();

        $user->fill($post);

				if(!$user->hasChanged()){
						
						return redirect()->back()
															->with('warning', 'Nothing to update')
															->withInput();
				}

				if ($this->model->protect(false)->save($user)){

            return redirect()->to("user/show/$id")
                            ->with('info', 'User Profile updated successfully');

        } else{

          return redirect()->back()
                          ->with('errors', $this->model->errors())
                          ->withInput();

        }
    }


    private function getUserOr404($id){

      $user = $this->model->where('id', $id)
                          ->first();

      if($user === null){

        throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id not found");
        
      }

      return $user;
  }
}
