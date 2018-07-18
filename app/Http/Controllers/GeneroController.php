<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('genero')->with("generos", $generos);
    }

    public function show($id)
    {
        return Genero::find($id);
    }

    public function store(Request $request)
    {
        return Genero::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Genero::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Genero::findOrFail($id);
        $article->delete();

        return 204;
    }
}
