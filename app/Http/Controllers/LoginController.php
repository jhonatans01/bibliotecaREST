<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    public function index()
    {
        return Login::all();
    }

    public function show($id)
    {
        return Login::find($id);
    }

    public function store(Request $request)
    {
        return Login::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Login::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Login::findOrFail($id);
        $article->delete();

        return 204;
    }
}
