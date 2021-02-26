<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalhePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_pedidos');
            $table->integer('id_produtos');
            $table->double('preço');
            $table->double('desconto');
            $table->integer('quantidade');
            $table->double('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhe_pedido');
    }
}
