<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor', function (Blueprint $table) {
            $table->increments('IDSENSOR');
            $table->integer('IDUSER');
            $table->string('NAME', 50);
            $table->string('KODE', 50);
            $table->string('DAYA', 50);
            $table->enum('FLAG', ['pln', 'battery', 'tools'])->nullable()->default('tools');
            $table->tinyInteger('CONTROL')->length(1)->unsigned();
            $table->tinyInteger('ISACTIVE')->length(1)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor');
    }
}
