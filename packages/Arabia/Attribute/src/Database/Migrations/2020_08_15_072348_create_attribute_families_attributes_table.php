<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeFamiliesAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_families_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id')->unsigned()->nullable();
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->bigInteger('attribute_family_id')->unsigned()->nullable();
            $table->foreign('attribute_family_id')->references('id')->on('attribute_families')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_families_attributes');
    }
}
