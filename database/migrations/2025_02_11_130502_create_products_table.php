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
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->string('qty');
            $table->string('tags')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_descp');
            $table->text('long_descp');
            $table->string('thambnail');
            $table->string('vendor_id')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(1); 
            $table->timestamps();
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
