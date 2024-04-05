<?php

namespace App\Controllers;

use App\Models\Mise;
use App\Models\Product;
use App\Models\Enchere;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class MiseController
{
    public function store($data)
    {
        $data['date_heure'] = date('Y-m-d H:i:s');
        $mise = new Mise;
        $insert = $mise->insert($data);

        if ($insert) {
            $enchere = new Enchere;
            $update = $enchere->updateOffert($data['prix_offert'], $data['id_enchere']);

            if ($update) {
                return View::redirect("enchere/show?id={$data['id_enchere']}");
            } else {
                echo "error";
            }
        } else {
        }
    }
}
