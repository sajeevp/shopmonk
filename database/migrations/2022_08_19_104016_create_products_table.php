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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable(); 
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('regular_price');
            $table->integer('selling_price');
            $table->string('currency_code')->default('INR');
            $table->integer('stock_quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('status')->default('1')->comment('0=active,1=deactive');
            $table->tinyInteger('featured')->default('0')->comment('1=featured,0=not=featured');
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); 
            $table->foreign('color_id')->references('id')->on('attributes')->onDelete('set null');
            $table->foreign('size_id')->references('id')->on('attributes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
