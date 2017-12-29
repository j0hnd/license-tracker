<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbreviation', 255);
            $table->string('name', 255);
            // $table->string('country', 255);
            // $table->string('type', 255);
            // $table->string('sort', 255);
            // $table->string('status', 255);
            // $table->string('occupied', 255);
            // $table->string('notes', 255);
            // $table->string('fips_state', 255);
            // $table->string('assoc_press', 255);
            // $table->string('standard_federal_region', 255);
            // $table->string('census_region', 255);
            // $table->string('census_region_name', 255);
            // $table->string('census_division', 255);
            // $table->string('census_division_name', 255);
            // $table->string('circuit_court', 255);
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
        Schema::dropIfExists('states');
    }
}
