<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::with(['perfil'])->get();
    }

    public function show($id)
    {
        return Usuario::with(['perfil'])->find($id);
    }

    public function store(Request $request)
    {
        $request->senha = bcrypt($request->senha);
        $article = Usuario::create($request->all());

        $data = new Perfil($request->perfil);
        $article->perfil()->save($data);

        return $article;
    }

    public function update(Request $request, $id)
    {
        $article = Usuario::findOrFail($id);
        $article->update($request->all());

        if ($request->perfil != null){
            $article->perfil()->update($request->perfil);
        }
        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Usuario::findOrFail($id);
        $article->delete();

        return 204;
    }
}
