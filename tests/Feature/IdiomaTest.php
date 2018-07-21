<?php

namespace Tests\Feature;

use App\Idioma;
use Tests\TestCase;

class IdiomaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/idiomas');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/idiomas', ['id' => '3', 'titulo' => 'Espanhol']);

        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/idiomas/3');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Idioma::where('titulo', 'Espanhol')->orderBy('id', 'desc')->first();
        $data['titulo'] = 'Alemão';
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/idiomas/edit/' . $data->id, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Idioma::where('titulo', 'Alemão')->orderBy('id', 'desc')->first();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/idiomas/delete/' . $data->id, $data->toArray());

        $response
            ->assertSuccessful();
    }
}
