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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('Site Title');
            $table->string('site_logo')->default('frontend/assets/img/logo.png');
            $table->enum('title_or_logo', ['title', 'logo'])->default('logo');
            $table->string('site_color')->default('#ff5a6e');
            $table->string('banner_title')->default('Get your free 2 weeks trial right here');
            $table->text('banner_subtitle')->default('Celebrated delightful an especially increasing instrument am. Indulgence contrastedsufficient to unpleasant in in insensible favourable.');
            $table->string('banner_image')->default('frontend/assets/img/2440x1578.png');
            $table->string('youtube_video_url')->default('https://www.youtube.com/watch?v=owhuBrGIOsE');
            $table->string('about_us_title')->default("We are Trusted by 2500+ Loyal Customer");
            $table->text('about_us_subtitle')->default('Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.');
            $table->string('offer_title')->default("What we Offer");
            $table->text('offer_subtitle')->default('Understanding the easy to use process');
            // $table->string('')->default('frontend/assets/img/2440x1578.png');
            // $table->string('')->default('frontend/assets/img/2440x1578.png');
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
        Schema::dropIfExists('home_contents');
    }
};
