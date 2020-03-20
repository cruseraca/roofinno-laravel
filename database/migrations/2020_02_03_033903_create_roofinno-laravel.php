<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoofinnoLaravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_inout', function (Blueprint $table) {
            $table->increments('IDINOUT');
            $table->integer('IDUSER');
            $table->string('POWER_PS',50);
            $table->string('POWER_LOAD',50);
            $table->dateTime('ONINSERT');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_inout');
    }
}
