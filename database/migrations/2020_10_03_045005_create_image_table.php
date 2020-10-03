<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();//id da img
            $table->string('path',150);//o caminho do storage dentro do sistema(texto com 150 caracteres)
            $table->foreignId('post_id')->constrained()->onDelete('cascade');//chave estrangeira para os posts( a img vai receber o id da publicação que ela pertence)
            $table->timestamps();//data e hora de criação e atualização da img
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
 