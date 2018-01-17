<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoApiTest extends TestCase
{
    use MakeEstadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstado()
    {
        $estado = $this->fakeEstadoData();
        $this->json('POST', '/api/v1/estados', $estado);

        $this->assertApiResponse($estado);
    }

    /**
     * @test
     */
    public function testReadEstado()
    {
        $estado = $this->makeEstado();
        $this->json('GET', '/api/v1/estados/'.$estado->id);

        $this->assertApiResponse($estado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstado()
    {
        $estado = $this->makeEstado();
        $editedEstado = $this->fakeEstadoData();

        $this->json('PUT', '/api/v1/estados/'.$estado->id, $editedEstado);

        $this->assertApiResponse($editedEstado);
    }

    /**
     * @test
     */
    public function testDeleteEstado()
    {
        $estado = $this->makeEstado();
        $this->json('DELETE', '/api/v1/estados/'.$estado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estados/'.$estado->id);

        $this->assertResponseStatus(404);
    }
}
