<?php

use Faker\Factory as Faker;
use App\Models\Estado;
use App\Repositories\EstadoRepository;

trait MakeEstadoTrait
{
    /**
     * Create fake instance of Estado and save it in database
     *
     * @param array $estadoFields
     * @return Estado
     */
    public function makeEstado($estadoFields = [])
    {
        /** @var EstadoRepository $estadoRepo */
        $estadoRepo = App::make(EstadoRepository::class);
        $theme = $this->fakeEstadoData($estadoFields);
        return $estadoRepo->create($theme);
    }

    /**
     * Get fake instance of Estado
     *
     * @param array $estadoFields
     * @return Estado
     */
    public function fakeEstado($estadoFields = [])
    {
        return new Estado($this->fakeEstadoData($estadoFields));
    }

    /**
     * Get fake data of Estado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstadoData($estadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'sigla' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $estadoFields);
    }
}
