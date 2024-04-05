<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController
{

    public function create()
    {   // if ($_SESSION['privilege_id'] == 1) {
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
        return View::render('user/create', ['privileges' => $privileges]);
        // } else {
        //     return View::render('error');
        // }
    }


    public function store($data)
    {
        $validator = new Validator;
        $validator->field('user_name', $data['user_name'])->min(2)->max(50);
        $validator->field('email', $data['email'])->min(2)->max(50)->email()->unique('User');
        $validator->field('password', $data['password'])->min(6)->max(40);
        $validator->field('id_privilege', $data['id_privilege'])->required();

        if ($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if ($insert) {
                return View::redirect('login');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['errors' => $errors, 'user' => $data, 'privileges' => $privileges]);
        }
    }


    public function index()
    {
        if (Auth::session()) {
            $user = new User;
            $select = $user->select();
            if ($select) {
                return View::render('user/index', ['users' => $select]);
            } else {
                return View::render('error');
            }
        }
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $user = new User;
            $selectId = $user->selectId($data['id']);
            if ($selectId) {
                return View::render('user/show', ['user' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }


    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $user = new User;
            $selectId = $user->selectId($data['id']);
            if ($selectId) {
                return View::render('user/edit', ['user' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }


    public function update($data, $get)
    {
        $validator = new Validator;
        $validator->field('user_name', $data['user_name'])->min(2)->max(50);
        $validator->field('email', $data['email'])->min(2)->max(50)->email()->max(45);

        if ($validator->isSuccess()) {
            $user = new User;
            $update = $user->update($data, $get['id']);

            if ($update) {
                return View::redirect('user/show?id=' . $get['id']);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('user/edit', ['errors' => $errors, 'user' => $data]);
        }
    }


    public function delete($data)
    {
        $user = new User;
        $delete = $user->delete($data['id']);
        if ($delete) {
            return View::redirect('home');
        } else {
            return View::render('error');
        }
    }
}
