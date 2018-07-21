<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    public function index()
    {
        return Livro::with(['idiomas', 'generos', 'autores'])->get();
    }

    public function show($id)
    {
        return Livro::with(['idiomas', 'generos', 'autores'])->find($id);
    }

    public function store(Request $request)
    {
        $article = Livro::create($request->all());
        $livro = Livro::find($article->cod);

        $generosId = [];

        foreach ($request->generos as $key => $value){
            array_push($generosId, $value['id']);
        };


        foreach ($request->autores as $key => $value){
            $livro->autores()->attach($value['id'], ['ordem' => $value['ordem']]);
        };

        $article = $livro->generos()->sync($generosId);

        return $article;
    }

    public function update(Request $request, $id)
    {
        $article = Livro::findOrFail($id);

        $generosId = [];
        $autoresId = array();

        if ($request->autores){
            foreach ($request->autores as $key => $value){
                array_add($autoresId, $value['id'], array('ordem' => $value['ordem']));
            }

            $article->autores()->sync($autoresId);
        }

        if ($request->generos){
            foreach ($request->generos as $key => $value){
                array_push($generosId, $value['id']);
            }
            $article->generos()->sync($generosId);
        }

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
