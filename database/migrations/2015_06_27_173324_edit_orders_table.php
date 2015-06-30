<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->integer('payment_id')->nullable();
            $table->tinyInteger('payment_type')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dropColumn('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dropColumn('payment_id');
            $table->dropColumn('payment_type');
            $table->dropColumn('sent_at');
            $table->tinyInteger('is_paid')->default(0)->nullable();
        });
    }
}
