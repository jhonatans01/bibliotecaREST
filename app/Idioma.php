<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = ['id', 'titulo'];

    public $timestamps = false;
}
