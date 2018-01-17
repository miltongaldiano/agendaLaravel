<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CidadeApiTest extends TestCase
{
    use MakeCidadeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCidade()
    {
        $cidade = $this->fakeCidadeData();
        $this->json('POST', '/api/v1/cidades', $cidade);

        $this->assertApiResponse($cidade);
    }

    /**
     * @test
     */
    public function testReadCidade()
    {
        $cidade = $this->makeCidade();
        $this->json('GET', '/api/v1/cidades/'.$cidade->id);

        $this->assertApiResponse($cidade->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCidade()
    {
        $cidade = $this->makeCidade();
        $editedCidade = $this->fakeCidadeData();

        $this->json('PUT', '/api/v1/cidades/'.$cidade->id, $editedCidade);

        $this->assertApiResponse($editedCidade);
    }

    /**
     * @test
     */
    public function testDeleteCidade()
    {
        $cidade = $this->makeCidade();
        $this->json('DELETE', '/api/v1/cidades/'.$cidade->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cidades/'.$cidade->id);

        $this->assertResponseStatus(404);
    }
}
