<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sessions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('inicio');
            $table->string('fim')->nullable();
            $table->string('ip', 45);
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
