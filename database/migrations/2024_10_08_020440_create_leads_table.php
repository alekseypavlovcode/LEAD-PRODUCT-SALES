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
        $table->id('id_leads');
        $table->date('tanggal')->nullable();
        $table->unsignedBigInteger('id_sales');
        $table->unsignedBigInteger('id_produk');
        $table->string('no_wa', 20);
        $table->string('nama_lead', 50);
        $table->string('kota', 50);
        $table->timestamps();

        $table->foreign('id_sales')->references('id_sales')->on('sales')->onDelete('cascade');
        $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
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
