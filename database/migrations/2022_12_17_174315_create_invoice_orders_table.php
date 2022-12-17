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
        Schema::create('invoice_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->references("id")->on('invoices')->onDelete('cascade');
            $table->foreignId('product_id')->references("id")->on('products')->onDelete('cascade');
            $table->foreignId('country_id')->references("id")->on('countries')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('price', 12, 2);
            $table->boolean('gst');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->date('shipping_date');
            $table->string('state');
            $table->string('house_address');
            $table->string('city');
            $table->string('postcode');
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
        Schema::dropIfExists('invoice_orders');
    }
};
