<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("Hospital Management System");
            $table->string("short_name")->default("HMS");
            $table->string("logo")->default("img/logo.png");
            $table->string("favicon")->default("img/logo.png");
            $table->string("email")->default("contact@hms.com");
            $table->string("phone")->default("013xxxxxxxx");
            $table->string("address")->default("Uttara, Sector No. 45, Dhaka, Bangladesh");
            $table->text("map")->default('<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d116797.66884654004!2d90.33774279795553!3d23.82118937781326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d23.7612256!2d90.420766!4m5!1s0x3755c59251b8eca5%3A0x29c83c89b6cf82b4!2sIUBAT%20GATE%20IUBAT%20GATE%2C%20IUBAT%2C%20Dhaka%201230!3m2!1d23.8883285!2d90.3905444!5e0!3m2!1sen!2sbd!4v1643859264268!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>');
            $table->text("slogan")->default("The customer is at the heart of our unique business model, which includes design.");
            $table->string("registration_status")->default('active');
            $table->string("banner")->default("img/banner.jpg");
            $table->string("welcome_text_title")->default("Welcome to Your Health Center");
            $table->text("welcome_text_short")->default("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!");
            $table->text("welcome_text_long")->default("Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur.
            Expedita iusto sunt beatae esse id nihil voluptates magni, excepturi distinctio impedit illo, incidunt iure facilis atque, inventore reprehenderit quidem aliquid recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quod ad sequi atque accusamus deleniti placeat dignissimos illum nulla voluptatibus vel optio, molestiae dolore velit iste maxime, nobis odio molestias!");
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
        Schema::dropIfExists('settings');
    }
}
