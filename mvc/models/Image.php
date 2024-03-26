<?php
namespace App\Models;
use App\Models\CRUD;

class Image extends CRUD{
    protected $table = 'stampee_image';
    protected $primaryKey = 'id';
    protected $fillable = ['image_principale', 'images', 'id_timbre'];
}


