<?php
namespace App\Models;
use App\Models\CRUD;

class Enchere extends CRUD{
    protected $table = 'stampee_enchere';
    protected $primaryKey = 'id';
    protected $fillable = ['prix_min', 'date_debut', 'date_fin', 'coup_de_coeur', 'id_user', 'active', 'id_timbre'];
}


