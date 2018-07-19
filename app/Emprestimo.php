<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = ['id', 'livro', 'usuario', 'dataEmprestimo', 'dataDevolucao', 'prazo'];

    protected $dateFormat = ['dataEmprestimo', 'dataDevolucao', 'prazo'];

    public $timestamps = false;

    public function livro()
    {
        return $this->hasOne('App\Livro');
    }

    public function generos()
    {
        return $this->belongsTo('App\Perfil');
    }
}
