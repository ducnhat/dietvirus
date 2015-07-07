<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProductKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_keys', function (Blueprint $table) {
            $table->dateTime('warranty_at')->nullable();
            $table->integer('use_for')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_keys', function (Blueprint $table) {
            $table->dropColumn('warranty_at');
            $table->dropColumn('use_for');
        });
    }
}
