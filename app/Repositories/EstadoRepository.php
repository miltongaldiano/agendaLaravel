<?php

namespace App\Repositories;

use App\Models\Estado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoRepository
 * @package App\Repositories
 * @version January 17, 2018, 11:02 pm UTC
 *
 * @method Estado findWithoutFail($id, $columns = ['*'])
 * @method Estado find($id, $columns = ['*'])
 * @method Estado first($columns = ['*'])
*/
class EstadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sigla'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estado::class;
    }
}
