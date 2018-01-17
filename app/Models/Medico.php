<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medico
 * @package App\Models
 * @version January 17, 2018, 11:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Agenda
 * @property string nome_medico
 * @property string crm
 */
class Medico extends Model
{
    use SoftDeletes;

    public $table = 'medicos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_medico',
        'crm'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome_medico' => 'string',
        'crm' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function agendas()
    {
        return $this->hasMany(\App\Models\Agenda::class);
    }
}
