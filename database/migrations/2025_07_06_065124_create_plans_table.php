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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price')->nullable();
            $table->string('duration')->default('/Year'); // optional
            $table->string('badge_icon')->nullable(); // e.g. bi bi-bar-chart-line
            $table->text('features')->nullable(); // JSON encoded
            $table->string('button_text')->nullable()->default('GET STARTED');
            $table->boolean('is_actived')->nullable()->default(false);
            $table->integer('order_number',false)->nullable()->default(0);

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
        Schema::dropIfExists('plans');
    }
};
