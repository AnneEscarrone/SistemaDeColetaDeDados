<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 200);
            $table->time('duracao');
            $table->integer('id_teclado')->unsigned()->nullable();
            $table->integer('id_mouse')->unsigned()->nullable() ;
            $table->integer('id_sessao')->unsigned();
            $table->integer('id_elemento')->unsigned()->nullable() ;
            $table->foreign('id_teclado')->
                    references('id')->
                    on('keyboards');
            $table->foreign('id_mouse')->
                    references('id')->
                    on('mouses');
            $table->foreign('id_sessao')->
                    references('id')->
                    on('sessions');
            $table->foreign('id_elemento')->
                    references('id')->
                    on('elements');
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
