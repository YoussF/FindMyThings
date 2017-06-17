<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingsAedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeds_pendings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('validate')->default(0);
            $table->tinyInteger('status')->nullable();
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

            $table->boolean('status_v')->default(0);
            $table->boolean('idcitygis_v')->default(0);
            $table->boolean('aedname_v')->default(0);
            $table->boolean('street_fr_v')->default(0);
            $table->boolean('street_nl_v')->default(0);
            $table->boolean('num_v')->default(0);
            $table->boolean('postcode_v')->default(0);
            $table->boolean('municipality_fr_v')->default(0);
            $table->boolean('municipality_nl_v')->default(0);
            $table->boolean('lat_v')->default(0);
            $table->boolean('lon_v')->default(0);
            $table->boolean('model_v')->default(0);
            $table->boolean('aedexpiration_v')->default(0);
            $table->boolean('infplace_fr_v')->default(0);
            $table->boolean('infplace_nl_v')->default(0);
            $table->boolean('infaccess_fr_v')->default(0);
            $table->boolean('infaccess_nl_v')->default(0);
            $table->boolean('point_v')->default(0);

            $table->string('img_a')->nullable();
            $table->string('img_b')->nullable();
            $table->string('img_c')->nullable();
            $table->string('img_d')->nullable();

            $table->boolean('img_a_v')->default(0);
            $table->boolean('img_b_v')->default(0);
            $table->boolean('img_c_v')->default(0);
            $table->boolean('img_d_v')->default(0);

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
        Schema::dropIfExists('aeds_pendings');
    }
}
