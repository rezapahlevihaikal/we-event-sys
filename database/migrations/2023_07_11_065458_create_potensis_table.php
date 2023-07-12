<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_revenue', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable();
            $table->integer('potensi')->nullable();
            $table->integer('aktual_potensi')->nullable();
            $table->integer('aktual_revenue')->nullable();
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
        Schema::dropIfExists('potensis');
    }
}
