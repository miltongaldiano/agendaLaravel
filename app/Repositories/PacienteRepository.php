<?php

namespace App\Repositories;

use App\Models\Paciente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PacienteRepository
 * @package App\Repositories
 * @version January 17, 2018, 11:01 pm UTC
 *
 * @method Paciente findWithoutFail($id, $columns = ['*'])
 * @method Paciente find($id, $columns = ['*'])
 * @method Paciente first($columns = ['*'])
*/
class PacienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf',
        'endereco',
        'numero',
        'bairro',
        'cidade_id',
        'cep'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Paciente::class;
    }
}
