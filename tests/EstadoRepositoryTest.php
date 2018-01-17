<?php

use App\Models\Estado;
use App\Repositories\EstadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoRepositoryTest extends TestCase
{
    use MakeEstadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstadoRepository
     */
    protected $estadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estadoRepo = App::make(EstadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEstado()
    {
        $estado = $this->fakeEstadoData();
        $createdEstado = $this->estadoRepo->create($estado);
        $createdEstado = $createdEstado->toArray();
        $this->assertArrayHasKey('id', $createdEstado);
        $this->assertNotNull($createdEstado['id'], 'Created Estado must have id specified');
        $this->assertNotNull(Estado::find($createdEstado['id']), 'Estado with given id must be in DB');
        $this->assertModelData($estado, $createdEstado);
    }

    /**
     * @test read
     */
    public function testReadEstado()
    {
        $estado = $this->makeEstado();
        $dbEstado = $this->estadoRepo->find($estado->id);
        $dbEstado = $dbEstado->toArray();
        $this->assertModelData($estado->toArray(), $dbEstado);
    }

    /**
     * @test update
     */
    public function testUpdateEstado()
    {
        $estado = $this->makeEstado();
        $fakeEstado = $this->fakeEstadoData();
        $updatedEstado = $this->estadoRepo->update($fakeEstado, $estado->id);
        $this->assertModelData($fakeEstado, $updatedEstado->toArray());
        $dbEstado = $this->estadoRepo->find($estado->id);
        $this->assertModelData($fakeEstado, $dbEstado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEstado()
    {
        $estado = $this->makeEstado();
        $resp = $this->estadoRepo->delete($estado->id);
        $this->assertTrue($resp);
        $this->assertNull(Estado::find($estado->id), 'Estado should not exist in DB');
    }
}
