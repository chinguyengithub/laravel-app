<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('iv_id');
            $table->Integer('iv_sold');
            $table->Integer('iv_upd');
            $table->Integer('sld_id')->unsigned();
            $table->foreign('sld_id')->references('sld_id')->on('sale_details')->onDelete('cascade');
            $table->Integer('prd_id')->unsigned();
            $table->foreign('prd_id')->references('prd_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('inventories');
    }
};
