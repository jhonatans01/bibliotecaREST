<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $primaryKey = 'cod';

    public $incrementing = false;

    protected $fillable = ['cod', 'codGeral', 'titulo', 'paginas', 'edicao', 'ano', 'idioma'];

    public $timestamps = false;


    public function generos()
    {
        return $this->belongsToMany('App\Genero', 'generos_livros', 'livro', 'genero');
    }

    public function idiomas()
    {
        return $this->hasOne('App\Idioma', 'id', 'idioma');
    }

    public function autores()
    {
        return $this->belongsToMany('App\Autor', 'autores_livros', 'livro', 'autor')
            ->withPivot('ordem');
    }
}
