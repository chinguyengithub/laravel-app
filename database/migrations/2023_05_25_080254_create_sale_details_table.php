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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->increments('sdt_id');
            $table->Integer('sdt_quantity');
            $table->float('sdt_prdprice');
            $table->float('sdt_totalprice');
            $table->Integer('sdt_lotnumber');
            $table->date('sdt_expiry');
            $table->Integer('sl_id')->unsigned();
            $table->foreign('sl_id')->references('sl_id')->on('sales')->onDelete('cascade');
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
        Schema::dropIfExists('sale_details');
    }
};
