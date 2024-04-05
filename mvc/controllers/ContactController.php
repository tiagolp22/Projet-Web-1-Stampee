<?php

namespace App\Controllers;

use App\Providers\View;

class ContactController
{
    public function index()
    {

        View::render('contact');
    }
}
