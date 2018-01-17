<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version January 17, 2018, 11:01 pm UTC
 *
 * @property \App\Models\Cidade cidade
 * @property \Illuminate\Database\Eloquent\Collection Agenda
 * @property string nome
 * @property string cpf
 * @property string endereco
 * @property string numero
 * @property string bairro
 * @property integer cidade_id
 * @property string cep
 */
class Paciente extends Model
{
    use SoftDeletes;

    public $table = 'pacientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'cpf',
        'endereco',
        'numero',
        'bairro',
        'cidade_id',
        'cep'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'cpf' => 'string',
        'endereco' => 'string',
        'numero' => 'string',
        'bairro' => 'string',
        'cidade_id' => 'integer',
        'cep' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cidade()
    {
        return $this->belongsTo(\App\Models\Cidade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function agendas()
    {
        return $this->hasMany(\App\Models\Agenda::class);
    }
}
