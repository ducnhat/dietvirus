<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditKeyWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('key_warranty', function (Blueprint $table) {
            $table->string('name');
            $table->softDeletes();
            $table->integer('product_key_id')->unsigned()->change();
            $table->integer('new_product_key_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('key_warranty', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('deleted_at');
            $table->dropColumn('new_product_key_id');
        });
    }
}
