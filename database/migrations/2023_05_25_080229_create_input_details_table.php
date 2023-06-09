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
        Schema::create('input_details', function (Blueprint $table) {
            $table->integer('dt_id')->primary();
            $table->Integer('dt_quatity');
            $table->string('dt_unit');
            $table->string('dt_lotnumber');
            $table->date('dt_expried');
            $table->float('dt_vat');
            $table->float('dt_inputprice');
            $table->float('dt_saleprice');
            $table->Integer('prd_id')->unsigned();
            $table->Integer('ip_id')->unsigned();
            $table->foreign('prd_id')->references('prd_id')->on('products')->onDelete('cascade');
            $table->foreign('ip_id')->references('ip_id')->on('inputs')->onDelete('cascade');
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
        Schema::dropIfExists('input_details');
    }
};
