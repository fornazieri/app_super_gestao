<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id'); // por convenção se usa o nome da tabela no singular _ o nome da coluna pk da tabela
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constraint
            $table->foreign('produto_id')->references('id')->on('produtos'); //produto_id faz referencia a coluna id da tabela produtos
            $table->unique('produto_id'); //para fazer o relacionamento ser de 1 para 1, ou seja, um produto só vai poder ter 1 produto_detalhe
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
