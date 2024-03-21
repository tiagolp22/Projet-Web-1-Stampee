<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
class UserController{


    public function create(){
        if($_SESSION['privilege_id'] == 1){
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['privileges' => $privileges]);
        }else{
            return View::render('error');
        }
        
    }

    public function store($data){

        if($_SESSION['privilege_id'] == 1){
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(50);
            $validator->field('username', $data['username'])->min(2)->max(50)->email()->unique('User');
            $validator->field('password', $data['password'])->min(6)->max(20);
            $validator->field('email', $data['email'])->required()->max(100)->email()->unique('User');
            $validator->field('privilge_id', $data['privilege_id'], 'Privilege')->required();

            
            if($validator->isSuccess()){
                $user = new User;

                $data['password'] = $user->hashPassword($data['password']);
            //$data['email'] = $data['username'];
                $insert = $user->insert($data);
                if($insert){
                    return View::redirect('user/index');
                }else{
                    return View::render('error');
                }

            }else{
                $errors = $validator->getErrors();
                $privilege = new Privilege;
                $privileges = $privilege->select('privilege');
                return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges' => $privileges]);
            }
        }else{
            return View::render('error');
        }
    }

    public function index()
    {
        if (Auth::session()) {
            $user = new User;
            $select = $user->select();

            if ($select) {
                return View::render('user/index', ['user' => $select]);
            } else {
                return View::render('error');
            }
        }
    }
    
}