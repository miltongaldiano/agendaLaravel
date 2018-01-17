<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estado
 * @package App\Models
 * @version January 17, 2018, 11:02 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection agendas
 * @property \Illuminate\Database\Eloquent\Collection Cidade
 * @property string nome
 * @property string sigla
 */
class Estado extends Model
{
    use SoftDeletes;

    public $table = 'estados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'sigla'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'sigla' => 'string'
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
    public function cidades()
    {
        return $this->hasMany(\App\Models\Cidade::class);
    }
}
