<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Elements extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id');
            $table->float('posicao_top');
            $table->float('posicao_left');
            $table->string('id_element', 75)->nullable();
            $table->string('url', 255);
            $table->string('tipo_elemento', 75);
            $table->boolean('focus_elemento');
            $table->string('texto',200)->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
