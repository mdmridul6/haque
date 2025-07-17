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
            $table->string('primary_phone')->default('123-456-7890');
            $table->string('secondary_phone')->default('098-765-4321');
            $table->string('email')->default('info@example.com');
            $table->string('address')->default('123 Main Street, City, Country');
            $table->string('support_email')->default('support@example.com');
            $table->string('support_phone')->default('123-456-7890');
            $table->text('google_map_embed')->default('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509123!2d144.9537363153165!3d-37.81627997975144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11b8b7%3A0x5045675218ce6e0!2sMelbourne%20CBD%2C%20Victoria%2C%20Australia!5e0!3m2!1sen!2sin!4v1616161616161" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>');
            $table->string('facebook_link')->default('https://www.facebook.com');
            $table->string('twitter_link')->default('https://www.twitter.com');
            $table->string('instagram_link')->default('https://www.instagram.com');
            $table->string('linkedin_link')->default('https://www.linkedin.com');
            $table->string('faq_video_link')->default('https://www.youtube.com/watch?v=example');
            $table->integer('satisfied_customers')->default(2500);
            $table->integer('years_of_experience')->default(5);
            $table->integer('projects_completed')->default(100);
            $table->integer('awards_won')->default(10);
            $table->text('terms_and_conditions')->nullable();
            $table->text('privacy_policy')->nullable();
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
