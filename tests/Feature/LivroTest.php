<?php

namespace Tests\Feature;

use App\Autor;
use App\Genero;
use App\Idioma;
use App\Livro;
use Tests\TestCase;

class LivroTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/api/livros');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $idioma = Idioma::all()->first();
        $generos = Genero::all();
        $autores = Autor::all();

        $livro = new Livro(['cod' => 'A000', 'codGeral' => 'A000', 'titulo' => 'Titulo1', 'paginas' => '10',
            'edicao' => '1', 'ano' => '2000', 'idioma' => $idioma->id]);

        $livro->generos = [$generos[0], $generos[1]];

        $autores[0]->ordem = 1;
        $autores[1]->ordem = 2;

        $livro->autores = [$autores[0], $autores[1]];

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/livros', $livro->toArray());
        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/livros/A1');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Livro::find('A000');
        $generos = Genero::all();
        $autores = Autor::all();

        $data->titulo = 'Titulo2';
        $data->generos = [$generos[1]];

        $autores[0]->ordem = 1;
        $autores[3]->ordem = 2;

        $data->autores = [$autores[0], $autores[3]];

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/livros/edit/' . $data->cod, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Livro::where('cod', 'A000')->first();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/livros/delete/' . $data->cod, $data->toArray());

        $response->assertSuccessful();
    }
}
