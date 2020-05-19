<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Funcionarios_clientes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'funcionarios_clientes';
    protected $fillable = [
        'nome_usuario', 'cpf_usuario'
    ];
}
