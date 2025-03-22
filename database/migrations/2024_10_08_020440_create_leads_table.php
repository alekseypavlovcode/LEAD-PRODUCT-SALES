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
    Schema::create('leads', function (Blueprint $table) {
        $table->id('lead_id');
        $table->date('date')->nullable();
        $table->unsignedBigInteger('sale_id');
        $table->unsignedBigInteger('product_id');
        $table->string('phone', 20);
        $table->string('lead_name', 50);
        $table->string('city', 50);
        $table->timestamps();

        $table->foreign('sale_id')->references('sale_id')->on('sales')->onDelete('cascade');
        $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
