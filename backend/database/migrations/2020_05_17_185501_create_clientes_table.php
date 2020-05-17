<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('nome_cliente');
            $table->string('cpf_cnpj');
            $table->bigInteger('id_escritorio')->unsigned();
            $table->bigInteger('id_plano')->unsigned();


            $table->foreign('id_escritorio')->references('id_escritorio')->on('escritorios')->onDelete('cascade');
            $table->foreign('id_plano')->references('id_plano')->on('planos_coworking')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
