<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female'])->length(50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('status')->default(1);
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_verified')->default(0);
            $table->string('token')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
