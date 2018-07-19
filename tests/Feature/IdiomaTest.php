<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function testPut()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/idiomas/edit/3', ['id' => '3', 'titulo' => 'Francês']);

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/idiomas/delete/3', ['id' => '3', 'titulo' => 'Francês']);

        $response
            ->assertSuccessful();
    }
}
