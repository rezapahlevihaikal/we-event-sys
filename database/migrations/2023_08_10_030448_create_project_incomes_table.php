<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_income', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('income_we');
            $table->integer('income_partner');
            $table->integer('ppn_we');
            $table->integer('ppn_partner');
            $table->integer('pph_we');
            $table->integer('pph_partner');
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
        Schema::dropIfExists('project_incomes');
    }
}
