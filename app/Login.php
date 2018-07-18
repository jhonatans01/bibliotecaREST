<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = ['matricula', 'email', 'senha'];

    protected $hidden = ['senha'];


}
