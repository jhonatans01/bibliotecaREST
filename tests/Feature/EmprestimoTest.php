<?php

namespace Tests\Feature;

use App\Emprestimo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmprestimoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/api/emprestimos');

        $response->assertSuccessful();
    }

    public function testPost()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/emprestimos', ['id' => '4', 'usuario' => '20180102', 'livro' => 'A2.2']);

        $response
            ->assertSuccessful();
    }

    public function testGetSingle()
    {
        $response = $this->get('/api/emprestimos/4');

        $response->assertSuccessful();
    }

    public function testPut()
    {
        $data = Emprestimo::where([
            ['livro', 'A2.2'],
            ['usuario', '20180102']
        ])->orderBy('dataEmprestimo', 'desc')->first();

        $data['livro'] = 'A4';
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/emprestimos/edit/' . $data->id, $data->toArray());

        $response->assertSuccessful();
    }

    public function testDelete()
    {
        $data = Emprestimo::where([
            ['livro', 'A4'],
            ['usuario', '20180102']
        ])->orderBy('dataEmprestimo', 'desc')->first();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/api/emprestimos/delete/' . $data->id, $data->toArray());

        $response
            ->assertSuccessful();
    }
}
