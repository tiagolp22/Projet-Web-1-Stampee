<?php

namespace App\Controllers;

use App\Models\Image;
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


    public function index()
    {
        if (Auth::session()) {
            $product = new Product;
            $select = $product->select_user_id($_SESSION['user_id']);
            //print_r($select);
            //include('views/product/index.php');
            if ($select) {
                return View::render('product/index', ['products' => $select]);
            } else {
                return View::render('error');
            }
        }
    }

    public function create()
    {
        //if ($_SESSION['id_privilege'] == 1 || $_SESSION['id_privilege'] == 2) {
            return View::render('product/create');   
        //} else {
        //     return View::render('error');
        // }
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $product = new Product;
            $selectId = $product->selectId($data['id']);
            $img = $product->select_image($data['id']);
           
            if ($selectId) {
                return View::render('product/show', ['product' => $selectId, 'img' => $img]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }

    
    public function store($data)
    {
        $validator = new Validator;
        $validator->field('timbre_nom', $data['timbre_nom'])->min(2)->max(80);
        $validator->field('date_creation', $data['date_creation'])->required();
        $validator->field('couleurs', $data['couleurs'])->required()->max(45);
        $validator->field('tirage', $data['tirage'])->required()->max(100);
        $validator->field('dimensions', $data['dimensions'])->required()->max(20);
        $validator->field('pays_origine', $data['pays_origine'])->required();
        $validator->field('categorie', $data['categorie'])->required();
        $validator->field('condition_etat', $data['condition_etat'])->required();
        $validator->field('certifie', $data['certifie'])->required();
        
        if (!$validator->isSuccess()) {
            $errors = $validator->getErrors();
            return View::render('product/create', ['errors' => $errors, 'product' => $data]);
        }
    
        $product = new Product;
        $insert = $product->insert($data);
        
        if (!$insert) {
            return View::render('error');
        }
    
        if (isset($_FILES['image_principale']) && $_FILES['image_principale']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "upload/";
            $image_name = basename($_FILES['image_principale']['name']);
            $target_file = $target_dir . $image_name;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            $check = getimagesize($_FILES["image_principale"]["tmp_name"]);
            if ($check === false) {
                $uploadOk = 0;
                return View::render('error', ['message' => "File is not an image."]);
            }
    
            if ($uploadOk) {
                if (move_uploaded_file($_FILES['image_principale']['tmp_name'], $target_file)) {
                    $img = new Image;
                    $imgChamps = ['id_timbre' => $insert, 'image_principale' => $image_name];
                    $insert_img = $img->insert($imgChamps);
    
                    if (!$insert_img) {
                        return View::render('error');
                    }
                } else {
                    return View::render('error');
                }
            }
        }
        return View::redirect('product/index');
    }
    


    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $product = new Product;
            $selectId = $product->selectId($data['id']);
            if ($selectId) {
                return View::render('product/edit', ['product' => $selectId]);
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
        $validator->field('timbre_nom', $data['timbre_nom'])->min(2)->max(80);
        $validator->field('date_creation', $data['date_creation'])->required();
        $validator->field('couleurs', $data['couleurs'])->required()->max(45);
        $validator->field('tirage', $data['tirage'])->required()->max(100);
        $validator->field('dimensions', $data['dimensions'])->required()->max(20);
        $validator->field('pays_origine', $data['pays_origine'])->required();
        $validator->field('categorie', $data['categorie'])->required();
        $validator->field('condition_etat', $data['condition_etat'])->required()->max(11);
        $validator->field('certifie', $data['certifie'])->required();

        if ($validator->isSuccess()) {
            $product = new Product;
            $update = $product->update($data, $get['id']);

            if ($update) {
                return View::redirect('product/show?id=' . $get['id']);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            //print_r($errors);
            return View::render('product/edit', ['errors' => $errors, 'product' => $data]);
        }
    }

    public function delete($data)
    {
        $product = new  Product;
        $delete = $product->delete($data['id']);
        if ($delete) {
            return View::redirect('product');
        } else {
            return View::render('error');
        }
    }
}
