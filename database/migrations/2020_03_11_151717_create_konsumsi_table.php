<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsumsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_konsumsi', function (Blueprint $table) {
            $table->increments('ID_KONS');
            $table->integer('IDUSER');
            $table->integer('IDSENSOR');
            $table->string('POWER',50);
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
        Schema::dropIfExists('data_konsumsi');
    }
}
