<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributeFamilyIdColumnToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_attribute_family_id_foreign');
            $table->dropColumn('attribute_family_id');
        });
    }
}
