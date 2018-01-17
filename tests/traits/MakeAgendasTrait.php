<?php

use Faker\Factory as Faker;
use App\Models\Agendas;
use App\Repositories\AgendasRepository;

trait MakeAgendasTrait
{
    /**
     * Create fake instance of Agendas and save it in database
     *
     * @param array $agendasFields
     * @return Agendas
     */
    public function makeAgendas($agendasFields = [])
    {
        /** @var AgendasRepository $agendasRepo */
        $agendasRepo = App::make(AgendasRepository::class);
        $theme = $this->fakeAgendasData($agendasFields);
        return $agendasRepo->create($theme);
    }

    /**
     * Get fake instance of Agendas
     *
     * @param array $agendasFields
     * @return Agendas
     */
    public function fakeAgendas($agendasFields = [])
    {
        return new Agendas($this->fakeAgendasData($agendasFields));
    }

    /**
     * Get fake data of Agendas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAgendasData($agendasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'datahora' => $fake->date('Y-m-d H:i:s'),
            'medico_id' => $fake->randomDigitNotNull,
            'paciente_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $agendasFields);
    }
}
