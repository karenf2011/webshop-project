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
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('time_period_id')->references('id')->on('time_periods');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 6, 2);
            $table->integer('stock');
            $table->year('design_year')->nullable();
            $table->year('production_year')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->userstamps();
            $table->softUserstamps();
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
