<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('items_qty', 12, 4)->nullable();
            $table->decimal('exchange_rate', 12, 4)->nullable();
            $table->string('currency_code')->nullable();
            $table->decimal('grand_total', 12, 4)->default(0)->nullable();
            $table->decimal('sub_total', 12, 4)->default(0)->nullable();
            $table->decimal('tax_total', 12, 4)->default(0)->nullable();
            $table->decimal('discount', 12, 4)->default(0)->nullable();
            $table->string('checkout_method')->nullable();
            $table->boolean('is_active')->nullable()->default(1);
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('cart');
    }
}
