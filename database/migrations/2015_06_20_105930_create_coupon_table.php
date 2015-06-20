<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('coupon')->unique();
            $table->string('type')->default('promo');
            $table->tinyInteger('target')->default(1);
            $table->integer('condition')->default(0)->nullable();
            $table->integer('value')->default(0);
            $table->integer('quantity')->default(0)->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupon');
    }
}
