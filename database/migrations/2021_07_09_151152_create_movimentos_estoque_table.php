<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosEstoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos_estoque', function (Blueprint $table) {
            $table->id();

            $table->char('tipo', 7);

            $table->decimal('quantidade', 10, 2);
            $table->decimal('valor', 10, 2);

            $table->foreignId('produto_id')->constrained();
            $table->foreignId('empresa_id')->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('movimentos_estoque');
    }
}
