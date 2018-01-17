<?php

use App\Models\Cidade;
use App\Repositories\CidadeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CidadeRepositoryTest extends TestCase
{
    use MakeCidadeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CidadeRepository
     */
    protected $cidadeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cidadeRepo = App::make(CidadeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCidade()
    {
        $cidade = $this->fakeCidadeData();
        $createdCidade = $this->cidadeRepo->create($cidade);
        $createdCidade = $createdCidade->toArray();
        $this->assertArrayHasKey('id', $createdCidade);
        $this->assertNotNull($createdCidade['id'], 'Created Cidade must have id specified');
        $this->assertNotNull(Cidade::find($createdCidade['id']), 'Cidade with given id must be in DB');
        $this->assertModelData($cidade, $createdCidade);
    }

    /**
     * @test read
     */
    public function testReadCidade()
    {
        $cidade = $this->makeCidade();
        $dbCidade = $this->cidadeRepo->find($cidade->id);
        $dbCidade = $dbCidade->toArray();
        $this->assertModelData($cidade->toArray(), $dbCidade);
    }

    /**
     * @test update
     */
    public function testUpdateCidade()
    {
        $cidade = $this->makeCidade();
        $fakeCidade = $this->fakeCidadeData();
        $updatedCidade = $this->cidadeRepo->update($fakeCidade, $cidade->id);
        $this->assertModelData($fakeCidade, $updatedCidade->toArray());
        $dbCidade = $this->cidadeRepo->find($cidade->id);
        $this->assertModelData($fakeCidade, $dbCidade->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCidade()
    {
        $cidade = $this->makeCidade();
        $resp = $this->cidadeRepo->delete($cidade->id);
        $this->assertTrue($resp);
        $this->assertNull(Cidade::find($cidade->id), 'Cidade should not exist in DB');
    }
}
