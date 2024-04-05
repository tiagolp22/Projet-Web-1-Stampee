<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Models\Product;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\Privilege;
use App\Models\Favoris;


class FavorisController
{

    public function index()
    {
        
            $favoris = new Favoris;
            $favorisListe = $favoris->selectUserIndex($_SESSION['user_id']);
            if ($favorisListe) {
                return View::render('favoris/index', ['favoris' => $favorisListe]);
            } 
        
    }


    public function store($data)
    {
        $validator = new Validator;
        $validator->field('id_enchere', $data['id_enchere'])->required()->max(25)->unique('Favoris');

        if ($validator->isSuccess()) {
            $favoris = new Favoris;
            $favoris_id = $favoris->insert($data);
            return View::redirect('favoris/index');
        } else {
            $errors = $validator->getErrors();
            $timbre = new Product;
            $timbres = $timbre->select('timbre_nom');
            return View::render('favoris/index', ['errors' => $errors, 'timbres' => $timbres]);
        }
    }


    public function delete($data)
    {var_dump($data);
        $favoris = new  Favoris;
        $delete = $favoris->delete($data['id']);
        if ($delete) {
            return View::redirect('favoris');
        } else {
            return View::render('error');
        }
    }
}
