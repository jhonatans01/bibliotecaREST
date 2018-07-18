<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

class IdiomaController extends Controller
{
    public function index()
    {
        return Idioma::all();
    }

    public function show($id)
    {
        return Idioma::find($id);
    }

    public function store(Request $request)
    {
        return Idioma::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Idioma::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Idioma::findOrFail($id);
        $article->delete();

        return 204;
    }
}
