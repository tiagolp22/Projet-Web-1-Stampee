<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Models\Product;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class EnchereController
{
    public function __construct(){
        Auth::session();
    }
    public function index()
    {
        if (Auth::session()) {
            $enchere = new Enchere;
            $select = $enchere->select();
            //print_r($select);
            //include('views/enchere/index.php');
            if ($select) {
                return View::render('enchere/index', ['encheres' => $select]);
            } else {
                return View::render('error');
            }
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere;
            $selectId = $enchere->selectId($data['id']);
            if ($selectId) {
                return View::render('enchere/show', ['enchere' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }

    public function create()
    {
        return View::render('enchere/create');
    }

    public function store($data)
{
    $validator = new Validator;
    $validator->field('prix_min', $data['prix_min'])->required()->min(2)->max(25);
    $validator->field('date_debut', $data['date_debut'])->required()->max(45);
    $validator->field('date_fin', $data['date_fin'])->required()->max(10);
    $validator->field('coup_de_coeur', $data['coup_de_coeur'])->required()->max(20);
    $validator->field('active', $data['active'])->required();
    $validator->field('id_user', $data['id_user'])->required();
    $validator->field('id_timbre', $data['id_timbre'])->required();

    if ($validator->isSuccess()) {
        $timbre = new Product;
        $timbreExists = $timbre->selectId($data['id_timbre']);
        if (!$timbreExists) {
            $errors['id_timbre'] = "n tem esse timbre.";
            return View::render('enchere/create', ['errors' => $errors, 'enchere' => $data]);
        }

        $enchere = new Enchere;
        $insert = $enchere->insert($data);
        if ($insert) {
            return View::redirect('enchere');
        } else {
            return View::render('error');
        }
    } else {
        $errors = $validator->getErrors();
        return View::render('enchere/create', ['errors' => $errors, 'enchere' => $data]);
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
        $validator->field('date_fin', $data['date_fin'])->required()->max(10);
        $validator->field('coup_de_coeur', $data['phcoup_de_coeurne'])->required()->max(20);
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
    {
        $enchere = new  Enchere;
        $delete = $enchere->delete($data['id']);
        if ($delete) {
            return View::redirect('enchere');
        } else {
            return View::render('error');
        }
    }
}
