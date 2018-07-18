<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $primaryKey = ['cod', 'codGeral'];

    protected $fillable = ['cod', 'codGeral', 'titulo', 'paginas', 'edicao', 'ano'];

    public $timestamps = false;

    public function generos()
    {
        return $this->hasMany('App\Genero');
    }

    public function idioma()
    {
        return $this->hasOne('App\Idioma');
    }

    public function autores()
    {
        return $this->hasMany('App\Autor');
    }
}
