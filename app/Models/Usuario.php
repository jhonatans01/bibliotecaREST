<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'matricula';

    public $incrementing = false;

    protected $fillable = ['matricula', 'email', 'senha'];

    protected $hidden = ['senha'];

    public $timestamps = false;

    public function perfil()
    {
        return $this->hasOne('App\Perfil');
    }
}
