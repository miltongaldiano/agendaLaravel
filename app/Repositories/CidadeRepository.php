<?php

namespace App\Repositories;

use App\Models\Cidade;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CidadeRepository
 * @package App\Repositories
 * @version January 17, 2018, 10:34 pm UTC
 *
 * @method Cidade findWithoutFail($id, $columns = ['*'])
 * @method Cidade find($id, $columns = ['*'])
 * @method Cidade first($columns = ['*'])
*/
class CidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado_id',
        'nome',
        'ibge'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cidade::class;
    }
}
