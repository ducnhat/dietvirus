<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_warranty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('product_key_id');
            $table->string('phone', 11);
            $table->tinyInteger('status')->default(0);
            $table->text('error_message');
            $table->tinyInteger('is_warranted')->default(0)->nullable();
            $table->text('resolve')->nullable();
            $table->dateTime('resolve_at')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::drop('key_warranty');
    }
}
