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
            $table->Integer('prd_id')->unsigned();
            $table->foreign('prd_id')->references('prd_id')->on('products')->onDelete('cascade');
            $table->Integer('dt_id')->unsigned();
            $table->foreign('dt_id')->references('dt_id')->on('input_details')->onDelete('cascade');
            $table->Integer('sdt_id')->unsigned();
            $table->foreign('sdt_id')->references('sdt_id')->on('sale_details')->onDelete('cascade');
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
