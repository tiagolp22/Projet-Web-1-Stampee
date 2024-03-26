<?php

namespace App\Controllers;

use App\Models\Image;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class ImageController
{
    public function __construct(){
        Auth::session();
    }
    public function index()
    {
        if (Auth::session()) {
            $image = new Image;
            $select = $image->select();
            //print_r($select);
            //include('views/image/index.php');
            if ($select) {
                return View::render('image/index', ['images' => $select]);
            } else {
                return View::render('error');
            }
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $image = new Image;
            $selectId = $image->selectId($data['id']);
            if ($selectId) {
                return View::render('image/show', ['image' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }

    public function create()
    {
        return View::render('image/create');
    }

    public function store($data)
    {

        $validator = new Validator;
        $validator->field('image_principale', $data['image_principale']);
        $validator->field('images', $data['images']);

        if ($validator->isSuccess()) {
            $image = new Image;
            $insert = $image->insert($data);
            if ($insert) {
                return View::redirect('image');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            //print_r($errors);
            return View::render('image/create', ['errors' => $errors, 'image' => $data]);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $image = new Image;
            $selectId = $image->selectId($data['id']);
            if ($selectId) {
                return View::render('image/edit', ['image' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }
    public function update($data, $get)
    {
        // $get['id'];
        $validator = new Validator;
        $validator->field('image_principale', $data['image_principale']);
        $validator->field('images', $data['images']);

        if ($validator->isSuccess()) {
            $image = new Image;
            $update = $image->update($data, $get['id']);

            if ($update) {
                return View::redirect('image/show?id=' . $get['id']);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            //print_r($errors);
            return View::render('image/edit', ['errors' => $errors, 'image' => $data]);
        }
    }

    public function delete($data)
    {
        $image = new  Image;
        $delete = $image->delete($data['id']);
        if ($delete) {
            return View::redirect('image');
        } else {
            return View::render('error');
        }
    }
}
