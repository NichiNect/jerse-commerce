<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga')->default(120000);
            $table->integer('harga_nameset')->default(50000);
            $table->boolean('is_ready')->default(true);
            $table->string('jenis')->default('Replica Best Quality');
            $table->float('berat')->default(0.5);
            $table->string('gambar');
            $table->integer('liga_id');

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
        Schema::dropIfExists('products');
    }
}
