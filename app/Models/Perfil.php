<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $primaryKey = 'usuario';

    public $incrementing = false;

    protected $table = 'perfis';

    protected $fillable = ['nome', 'cpf', 'ativo', 'usuario'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario', 'matricula');
    }

    public function emprestimos()
    {
        return $this->hasMany('App\Emprestimo');
    }
}
