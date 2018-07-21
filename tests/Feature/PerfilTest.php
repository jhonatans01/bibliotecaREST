<?php

namespace Tests\Feature;

use Tests\TestCase;

class PerfilTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/api/perfis');

        $response->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/perfis/20180101');

        $response->assertSuccessful();
    }
}
