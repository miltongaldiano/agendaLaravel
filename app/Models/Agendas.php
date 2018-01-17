<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agendas
 * @package App\Models
 * @version January 16, 2018, 1:34 am UTC
 *
 * @property \App\Models\Medico medico
 * @property \App\Models\Paciente paciente
 * @property string|\Carbon\Carbon datahora
 * @property integer medico_id
 * @property integer paciente_id
 */
class Agendas extends Model
{
    use SoftDeletes;

    public $table = 'agendas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'datahora',
        'medico_id',
        'paciente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'medico_id' => 'integer',
        'paciente_id' => 'integer'
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
    public function medico()
    {
        return $this->belongsTo(\App\Models\Medico::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class);
    }
}
