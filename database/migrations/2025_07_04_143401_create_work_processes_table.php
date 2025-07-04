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
        Schema::create('work_processes', function (Blueprint $table) {
            $table->id();
            $table->string('button_title')->default('Button Title');
            $table->string('process_title')->default('Engineered and Optimization by conveying. Him plate you allow built grave.');
            $table->string('process_description')->default('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, at.');
            $table->string('image')->default('frontend/assets/img/800x800.png');
            $table->string('type_1_title')->default('Amazingly Simple Use')->nullable();
            $table->string('type_1_sub_title')->default('Certainty arranging am smallness by conveying')->nullable();
            $table->string('type_2_title')->default('Clear Documentation')->nullable();
            $table->string('type_2_sub_title')->default('Frankness pronounce daughters remainder extensive')->nullable();
            $table->string('type_3_title')->default('Flexible user interface')->nullable();
            $table->string('type_3_sub_title')->default('Outward general passage another as it. Very his are come man walk one next. Delighted prevailed supported')->nullable();
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
        Schema::dropIfExists('work_processes');
    }
};
