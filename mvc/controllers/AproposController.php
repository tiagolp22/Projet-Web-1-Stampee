<?php

namespace App\Controllers;

use App\Providers\View;

class AproposController
{


    public function index()
    {

        View::render('apropos');
    }
}
