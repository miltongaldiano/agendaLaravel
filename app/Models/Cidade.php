<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cidade
 * @package App\Models
 * @version January 17, 2018, 10:34 pm UTC
 *
 * @property \App\Models\Estado estado
 * @property \Illuminate\Database\Eloquent\Collection agendas
 * @property \Illuminate\Database\Eloquent\Collection Paciente
 * @property integer estado_id
 * @property string nome
 * @property string ibge
 */
class Cidade extends Model
{
    use SoftDeletes;

    public $table = 'cidades';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'estado_id',
        'nome',
        'ibge'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado_id' => 'integer',
        'nome' => 'string',
        'ibge' => 'string'
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
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pacientes()
    {
        return $this->hasMany(\App\Models\Paciente::class);
    }
}
