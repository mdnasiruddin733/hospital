<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("whatsapp")->nullable();
            $table->string("meet_link")->nullable();
            $table->string("specialization")->nullable();
            $table->text("detail")->default("None");
            $table->string("time")->default("None");
            $table->string("day")->default("none");
            $table->string("room")->default("none");
            $table->boolean("status")->default(1);
            $table->double("visit_fee")->default(500);
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
