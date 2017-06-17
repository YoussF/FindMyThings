<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeds', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('status')->nullable();
            $table->integer('valdate')->nullable();
            $table->integer('idcitygis')->nullable();
            $table->string('aedname')->nullable();
            $table->string('street_fr')->nullable();
            $table->string('street_nl')->nullable();
            $table->string('num')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('municipality_fr')->nullable();
            $table->string('municipality_nl')->nullable();
            $table->float('lat')->nullable();
            $table->float('lon')->nullable();
            $table->string('model')->nullable();
            $table->integer('aedexpiration')->nullable();
            $table->text('infplace_fr')->nullable();
            $table->text('infplace_nl')->nullable();
            $table->text('infaccess_fr')->nullable();
            $table->text('infaccess_nl')->nullable();
            $table->string('point')->nullable();
            $table->string('img_a')->nullable();
            $table->string('img_b')->nullable();
            $table->string('img_c')->nullable();
            $table->string('img_d')->nullable();
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
        Schema::dropIfExists('aeds');
    }
}
