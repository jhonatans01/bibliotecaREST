<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Usuario;

class UsuarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/api/usuarios');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $data = ['matricula' => '20180103', 'email' => 'u3@email.com', 'senha' => bcrypt('321')];
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/usuarios', $data);

        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/usuarios/20180103');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Usuario::where('matricula', '20180103')->first();
        $data['email'] = 'u4@email.com';
        $data['senha'] = bcrypt('234');
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/usuarios/edit/' . $data->matricula, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Usuario::where('matricula', '20180103')->first();
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/usuarios/delete/' . $data->matricula, $data->toArray());

        $response
            ->assertSuccessful();
    }
}
