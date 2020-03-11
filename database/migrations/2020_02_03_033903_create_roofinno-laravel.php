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
            $table->integer('IDSENSOR');
            $table->string('POWER',50);
            $table->string('VOLTAGE',50);
            $table->string('CURRENT',50);
<<<<<<< HEAD
            $table->timestamps();
=======
            $table->dateTime('ONINSERT');
            $table->enum('FLAG',['load','battery','pln','ps']);
>>>>>>> 3ab8f4f7d5c7cd0f5365d953356ad3388d329ce4
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
