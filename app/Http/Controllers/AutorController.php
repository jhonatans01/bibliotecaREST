<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{
    public function index()
    {
        return Autor::all();
    }

    public function show($id)
    {
        return Autor::find($id);
    }

    public function store(Request $request)
    {
        return Autor::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Autor::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Autor::findOrFail($id);
        $article->delete();

        return 204;
    }
}
