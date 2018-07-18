<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = ['matricula'];

    protected $fillable = ['matricula', 'email', 'senha'];

    protected $hidden = ['senha'];

    public function perfil()
    {
        return $this->hasOne('App\Perfil');
    }
}
