<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('messages');
            $table->integer('rating')->unsigned();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_comments');
    }
};
