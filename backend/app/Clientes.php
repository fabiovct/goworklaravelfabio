<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Clientes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'clientes';
    protected $fillable = [
        'nome_cliente', 'cpf_cnpj'
    ];
}
