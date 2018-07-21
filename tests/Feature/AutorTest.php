<?php

namespace Tests\Feature;

use App\Autor;
use Tests\TestCase;

class AutorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/autores');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/autores', ['id' => '8', 'nome' => 'Raul Wazlawick']);

        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/autores/8');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Autor::where('nome', 'Raul Wazlawick')->orderBy('id', 'desc')->first();
        $data['nome'] = 'Donald Knuth';
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/autores/edit/' . $data->id, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Autor::where('nome', 'Donald Knuth')->orderBy('id', 'desc')->first();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/autores/delete/' . $data->id, $data->toArray());

        $response
            ->assertSuccessful();
    }
}
