<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class ProductController
{
    public function __construct()
    {
        Auth::session();
    }

    public function create()
    {
        if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 3) {
            return View::render('product/create');
        } else {
            return View::render('error');
        }
    }

    public function store($data)
    {
        if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 3) {
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(100);
            $validator->field('description', $data['description'])->max(255);
            $validator->field('price', $data['price'])->required();

            if ($validator->isSuccess()) {
                $product = new Product;
                $insert = $product->insert($data);
                if ($insert) {
                    return View::redirect('product/index');
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('product/create', ['errors' => $errors, 'product' => $data]);
            }
        } else {
            return View::render('error');
        }
    }
}
