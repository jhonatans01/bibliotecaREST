<?php

namespace Tests\Feature;

use App\Genero;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GeneroTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/generos');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/generos', ['id' => '4', 'titulo' => 'Biologia']);

        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/generos/3');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Genero::where('titulo', 'Biologia')->orderBy('id', 'desc')->first();
        $data['titulo'] = 'Filosofia';
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('PUT', '/api/generos/edit/' . $data->id, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Genero::where('titulo', 'Filosofia')->orderBy('id', 'desc')->first();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/generos/delete/' . $data->id, $data->toArray());

        $response
            ->assertSuccessful();
    }
}
