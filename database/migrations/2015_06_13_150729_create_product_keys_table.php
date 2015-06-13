<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('sold_at')->nullable();
            $table->dateTime('return_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_keys');
    }
}
