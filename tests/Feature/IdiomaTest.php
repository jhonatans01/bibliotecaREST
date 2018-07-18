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

        $response->assertStatus(200);
    }
}
