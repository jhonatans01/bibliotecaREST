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

    public function store(Request $request)
    {
        return Perfil::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Perfil::findOrFail($id);
        $article->update($request->all());

        return $article;
    }
}
