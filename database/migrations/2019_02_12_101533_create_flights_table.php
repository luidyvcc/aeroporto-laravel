<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plane_id')->unsigned();
            $table->integer('airport_origin_id')->unsigned();
            $table->integer('airport_destination_id')->unsigned();
            $table->date('date');
            $table->time('time_duration');
            $table->time('hour_output');
            $table->time('arrival_time');
            $table->double('old_price', 10, 2);
            $table->double('price', 10, 2);
            $table->integer('total_plots');
            $table->boolean('is_promotion')->default(false);
            $table->string('image', 200)->nullable();
            $table->integer('qty_stops')->default(0);
            $table->text('descrition')->nullable();
            $table->timestamps();

            $table->foreign('plane_id')
                ->references('id')
                ->on('planes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('airport_origin_id')
                ->references('id')
                ->on('airports')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('airport_destination_id')
                ->references('id')
                ->on('airports')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
