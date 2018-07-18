<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'cpf', 'ativo'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
