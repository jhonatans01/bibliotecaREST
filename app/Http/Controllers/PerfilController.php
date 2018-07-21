<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilController extends Controller
{
    public function index()
    {
        return Perfil::all();
    }

    public function show($id)
    {
        return Perfil::find($id);
    }
}
