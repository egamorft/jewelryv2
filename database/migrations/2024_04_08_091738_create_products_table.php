<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('photos')->nullable();
            $table->string('thumbnail_img')->default('/assets/images/default-product.png');
            $table->double('price');
            $table->integer('current_stock')->default(0);
            $table->integer('min_qty')->default(1);
            $table->double('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->timestamp('discount_end')->nullable();
            $table->double('rating')->default(0.00);
            $table->tinyInteger('installment')->default(0);
            $table->longText('spec_n_details')->nullable();
            $table->longText('delivery_n_notice')->nullable();
            $table->longText('exchange')->nullable();
            $table->tinyInteger('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
