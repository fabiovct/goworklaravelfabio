<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Planos_coworking extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'planos_coworking';
    protected $fillable = [
        'nome_plano', 'valor_mensal'
    ];
}
