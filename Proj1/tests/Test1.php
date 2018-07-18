<?php

include("./src/Models/Carro.php");
/**
 * Classe Carro Teste
 **/
class Test1 extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost']);
    }

    public function tearDown() {
        $this->http = null;
    }

    public function testeCor()
    {
        $carro = new Carro();
        $carro->setCor("Azul");

        $this->assertEquals("Azul", $carro->getCor());
    }

    public function testGet()
    {
        $response = $this->http->request('GET', '/usuario/lista');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);

        $userAgent = json_decode($response->getBody())->{"user-agent"};
        $this->assertRegexp('/usuario/lista', $userAgent);
    }
}