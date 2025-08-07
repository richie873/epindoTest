<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('production_id'); // relasi ke produksi
            $table->string('customer_name'); // nama pelanggan
            $table->integer('quantity_sold'); // jumlah produk terjual
            $table->decimal('price', 10, 2); // harga total
            $table->date('invoice_date'); // tanggal invoice
            $table->string('issued_by'); // nama petugas yang buat invoice
            $table->timestamps();

            $table->foreign('production_id')->references('id')->on('produksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
