<?php

namespace App\Repositories;

use App\Models\Agenda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AgendaRepository
 * @package App\Repositories
 * @version January 17, 2018, 11:02 pm UTC
 *
 * @method Agenda findWithoutFail($id, $columns = ['*'])
 * @method Agenda find($id, $columns = ['*'])
 * @method Agenda first($columns = ['*'])
*/
class AgendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'datahora',
        'medico_id',
        'paciente_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agenda::class;
    }
}
