<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = ['id', 'nome'];

    public $timestamps = false;

    public function livros()
    {
        return $this->hasMany('App\Livro');
    }
}
