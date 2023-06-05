<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiences', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_peserta')->nullable();
            $table->integer('target_peserta')->nullable();
            $table->integer('aktual_peserta')->nullable();
            $table->integer('target_hybrid')->nullable();
            $table->integer('aktual_hybrid')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('audiences');
    }
}
