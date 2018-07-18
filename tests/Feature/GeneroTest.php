<?php

namespace Tests\Feature;

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
    /*public function testGet()
    {
        $response = $this->get('/api/generos');

        $response->assertViewIs('genero');
    }*/

    public function testPost()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/generos', ['id' => '3', 'titulo' => 'Biologia']);

        $response
            ->assertSuccessful();
    }

    public function testPut()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/generos/edit/3', ['id' => '3', 'titulo' => 'Filosofia']);

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/generos/delete/3', ['id' => '3', 'titulo' => 'Filosofia']);

        $response
            ->assertSuccessful();
    }
}
