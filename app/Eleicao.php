<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'eleicaos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'ano', 'data', 'ativo'];

    
}
