<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Models\Product;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\Privilege;


class EnchereController
{

    public function __construct()
    {
        Auth::session();
    }


    public function index()
    {
        $enchereModel = new Enchere;
        $encheres = $enchereModel->select();

        $data = [];

        foreach ($encheres as $enchere) {
            $product = new Product;
            $productData = $product->selectId($enchere['id_timbre']);
            $image = $product->select_image($enchere['id_timbre']);

            if ($productData && $image) {
                $data[] = [
                    'id' => $enchere['id'],
                    'image' => $image,
                    'timbre_nom' => $productData['timbre_nom'],
                    'product_id' => $productData['id']
                ];
            }
        }

        return View::render('enchere/index', ['encheres' => $data]);
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere;
            $selectId = $enchere->selectId($data['id']);
            $product = new Product;
            $nom_produit =$product->selectId($selectId['id_timbre']);
            $img = $product->select_image($selectId['id_timbre']);

            if ($selectId && $img && $nom_produit) {
                return View::render('enchere/show', ['enchere' => $selectId, 'img' => $img,'timbre_nom' => $nom_produit['timbre_nom']]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }


    public function create()
    {
        $timbre = new Product;
        $timbre = $timbre->select('timbre_nom');
        if ($_SESSION['privilege_id'] == 1) {
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('enchere/create', ['timbres' => $timbre]);
        } else {
            return View::render('enchere/create', ['timbres' => $timbre]);
        }
    }


    public function store($data)
    {
        
        $validator = new Validator;
        $validator->field('id_timbre', $data['id_timbre'])->required()->max(25)->unique('Enchere');
        $validator->field('prix_min', $data['prix_min'])->required()->max(25);
        $validator->field('date_debut', $data['date_debut'])->required()->max(45);
        $validator->field('date_fin', $data['date_fin'])->required()->max(45);
        $validator->field('coup_de_coeur', $data['coup_de_coeur'])->required()->max(20);
        $validator->field('active', $data['active'])->required();

        if ($validator->isSuccess()) {
            $enchere = new Enchere;
            $enchere_id = $enchere->insert($data);
            return View::redirect('enchere/index');
        } else {
            $errors = $validator->getErrors();
            $timbre = new Product;
            $timbres = $timbre->select('timbre_nom');
            return View::render('enchere/index', ['errors' => $errors, 'timbres' => $timbres]);
        }
    }


    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere;
            $selectId = $enchere->selectId($data['id']);
            if ($selectId) {
                return View::render('enchere/edit', ['enchere' => $selectId]);
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
        $validator->field('prix_min', $data['prix_min'])->required()->min(2)->max(25);
        $validator->field('date_debut', $data['date_debut'])->required()->max(45);
        $validator->field('date_fin', $data['date_fin'])->required()->max(45);
        $validator->field('coup_de_coeur', $data['coup_de_coeur'])->required()->max(20);
        $validator->field('active', $data['active'])->required();

        if ($validator->isSuccess()) {
            $enchere = new Enchere;
            $update = $enchere->update($data, $get['id']);

            if ($update) {
                return View::redirect('enchere/show?id=' . $get['id']);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('enchere/edit', ['errors' => $errors, 'enchere' => $data]);
        }
    }


    public function delete($data)
    {var_dump($data);
        $enchere = new  Enchere;
        $delete = $enchere->delete($data['id']);
        if ($delete) {
            return View::redirect('enchere');
        } else {
            return View::render('error');
        }
    }
}
