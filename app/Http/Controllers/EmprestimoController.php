<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;

class EmprestimoController extends Controller
{
    public function index()
    {
        return Emprestimo::all();
    }

    public function show($id)
    {
        return Emprestimo::find($id);
    }

    public function store(Request $request)
    {
        return Emprestimo::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Emprestimo::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Emprestimo::findOrFail($id);
        $article->delete();

        return 204;
    }
}
