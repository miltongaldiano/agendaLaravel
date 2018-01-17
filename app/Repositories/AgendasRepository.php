<?php

namespace App\Repositories;

use App\Models\Agendas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AgendasRepository
 * @package App\Repositories
 * @version January 16, 2018, 1:34 am UTC
 *
 * @method Agendas findWithoutFail($id, $columns = ['*'])
 * @method Agendas find($id, $columns = ['*'])
 * @method Agendas first($columns = ['*'])
*/
class AgendasRepository extends BaseRepository
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
        return Agendas::class;
    }
}
