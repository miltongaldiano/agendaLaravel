<?php

use App\Models\Agendas;
use App\Repositories\AgendasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgendasRepositoryTest extends TestCase
{
    use MakeAgendasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgendasRepository
     */
    protected $agendasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agendasRepo = App::make(AgendasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAgendas()
    {
        $agendas = $this->fakeAgendasData();
        $createdAgendas = $this->agendasRepo->create($agendas);
        $createdAgendas = $createdAgendas->toArray();
        $this->assertArrayHasKey('id', $createdAgendas);
        $this->assertNotNull($createdAgendas['id'], 'Created Agendas must have id specified');
        $this->assertNotNull(Agendas::find($createdAgendas['id']), 'Agendas with given id must be in DB');
        $this->assertModelData($agendas, $createdAgendas);
    }

    /**
     * @test read
     */
    public function testReadAgendas()
    {
        $agendas = $this->makeAgendas();
        $dbAgendas = $this->agendasRepo->find($agendas->id);
        $dbAgendas = $dbAgendas->toArray();
        $this->assertModelData($agendas->toArray(), $dbAgendas);
    }

    /**
     * @test update
     */
    public function testUpdateAgendas()
    {
        $agendas = $this->makeAgendas();
        $fakeAgendas = $this->fakeAgendasData();
        $updatedAgendas = $this->agendasRepo->update($fakeAgendas, $agendas->id);
        $this->assertModelData($fakeAgendas, $updatedAgendas->toArray());
        $dbAgendas = $this->agendasRepo->find($agendas->id);
        $this->assertModelData($fakeAgendas, $dbAgendas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAgendas()
    {
        $agendas = $this->makeAgendas();
        $resp = $this->agendasRepo->delete($agendas->id);
        $this->assertTrue($resp);
        $this->assertNull(Agendas::find($agendas->id), 'Agendas should not exist in DB');
    }
}
