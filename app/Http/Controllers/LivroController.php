<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    public function index()
    {
        return Livro::all();
    }

    public function show($id)
    {
        return Livro::find($id);
    }

    public function store(Request $request)
    {
        return Livro::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Livro::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Livro::findOrFail($id);
        $article->delete();

        return 204;
    }
}
