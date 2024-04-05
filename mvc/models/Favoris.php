<?php

namespace App\Models;

use App\Models\CRUD;

class Favoris extends CRUD
{
    protected $table = 'stampee_favoris';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_enchere', 'date_ajout'];
}


