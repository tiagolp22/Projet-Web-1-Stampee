<?php

namespace App\Models;

use App\Models\CRUD;

class Mise extends CRUD
{
    protected $table = 'stampee_mise';
    protected $primaryKey = 'id';
    protected $fillable = ['prix_offert', 'date_heure', 'id_enchere', 'id_user'];
}
