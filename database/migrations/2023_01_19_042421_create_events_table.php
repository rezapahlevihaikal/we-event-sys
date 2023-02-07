<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('tipe_id')->nullable();
            $table->string('tema')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('lokasi')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->dateTime('schedule')->nullable();
            $table->dateTime('on_event')->nullable();
            $table->string('file')->nullable();
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('events');
    }
}
