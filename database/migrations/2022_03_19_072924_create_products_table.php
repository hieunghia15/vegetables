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
            $table->string('name');
            $table->string('thumbnail');
            $table->decimal('price', 11, 0);
            $table->longText('description')->nullable();
            $table->integer('inventory');
            $table->string('pack');
            $table->float('weight', 5, 2);
            $table->string('product_slug');
            $table->string('is_actived');
            $table->longText('planting_methods')->nullable();
            $table->string('farm_product_type_id');
            $table->string('express_id');
            $table->string('scale_id');
            $table->string('unit_id');
            $table->string('farmer_id');
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