<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['id', 'titulo'];

    public $timestamps = false;

    public function livros()
    {
        return $this->hasMany('App\Livro');
    }
}
