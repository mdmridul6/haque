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
        Schema::create('offer_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number')->default(0);
            $table->string('title',40)->default('Title');
            $table->string('sub_title',90)->default('Sub Title');
            $table->string('icon',90)->default('fab fa-connectdevelop');
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
        Schema::dropIfExists('offer_contents');
    }
};
