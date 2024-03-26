<?php

namespace App\Models;

use App\Models\CRUD;

class Product extends CRUD
{
    protected $table = 'stampee_timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['timbre_nom', 'date_creation', 'couleurs', 'tirage', 'dimensions', 'pays_origine', 'categorie', 'condition_etat', 'certifie', 'id_user'];
}
