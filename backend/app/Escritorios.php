<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Escritorios extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'escritorios';
    protected $fillable = [
       'nome_escritorio', 'endereco_escritorio'
    ];


}
