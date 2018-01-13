<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->smallInteger('icon_id')->unsigned()->nullable();
            $table->smallInteger('photo_id')->unsigned()->nullable();
            $table->smallInteger('category_id')->unsigned()->nullable();
            $table->smallInteger('subcategory_id')->unsigned()->nullable();
            $table->string('brand');
            $table->string('model');
            $table->integer('price');
            $table->text('description');
            $table->date('released_on')->nullable();
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
