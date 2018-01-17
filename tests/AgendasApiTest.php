<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgendasApiTest extends TestCase
{
    use MakeAgendasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAgendas()
    {
        $agendas = $this->fakeAgendasData();
        $this->json('POST', '/api/v1/agendas', $agendas);

        $this->assertApiResponse($agendas);
    }

    /**
     * @test
     */
    public function testReadAgendas()
    {
        $agendas = $this->makeAgendas();
        $this->json('GET', '/api/v1/agendas/'.$agendas->id);

        $this->assertApiResponse($agendas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAgendas()
    {
        $agendas = $this->makeAgendas();
        $editedAgendas = $this->fakeAgendasData();

        $this->json('PUT', '/api/v1/agendas/'.$agendas->id, $editedAgendas);

        $this->assertApiResponse($editedAgendas);
    }

    /**
     * @test
     */
    public function testDeleteAgendas()
    {
        $agendas = $this->makeAgendas();
        $this->json('DELETE', '/api/v1/agendas/'.$agendas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agendas/'.$agendas->id);

        $this->assertResponseStatus(404);
    }
}
