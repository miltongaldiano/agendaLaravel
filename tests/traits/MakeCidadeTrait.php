<?php

use Faker\Factory as Faker;
use App\Models\Cidade;
use App\Repositories\CidadeRepository;

trait MakeCidadeTrait
{
    /**
     * Create fake instance of Cidade and save it in database
     *
     * @param array $cidadeFields
     * @return Cidade
     */
    public function makeCidade($cidadeFields = [])
    {
        /** @var CidadeRepository $cidadeRepo */
        $cidadeRepo = App::make(CidadeRepository::class);
        $theme = $this->fakeCidadeData($cidadeFields);
        return $cidadeRepo->create($theme);
    }

    /**
     * Get fake instance of Cidade
     *
     * @param array $cidadeFields
     * @return Cidade
     */
    public function fakeCidade($cidadeFields = [])
    {
        return new Cidade($this->fakeCidadeData($cidadeFields));
    }

    /**
     * Get fake data of Cidade
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCidadeData($cidadeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'estado_id' => $fake->randomDigitNotNull,
            'nome' => $fake->word,
            'ibge' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $cidadeFields);
    }
}
