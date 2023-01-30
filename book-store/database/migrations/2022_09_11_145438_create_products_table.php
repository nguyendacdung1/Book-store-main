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
            $table->integer('author_id')->unsigned();
            $table->integer('product_category_id');
            $table->string('nxb');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('type')->nullable();//Loại bìa cứng,mềm
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->integer('pages')->nullable();//Số trang
            $table->string('pub_year')->nullable();
            $table->integer('qty')->default(0);
            $table->double('price')->default(0);
            $table->double('discount')->default(0);
            $table->boolean('featured')->default(true);
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
};
