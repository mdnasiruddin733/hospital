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
            $table->string("name");
            $table->string("short_name");
            $table->string("logo");
            $table->string("favicon");
            $table->string("email");
            $table->string("phone");
            $table->string("address");
            $table->text("map")->nullable();
            $table->text("slogan");
            $table->string("registration_status");
            $table->string("banner");
            $table->string("welcome_text_title");
            $table->text("welcome_text_short");
            $table->text("welcome_text_long");
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
