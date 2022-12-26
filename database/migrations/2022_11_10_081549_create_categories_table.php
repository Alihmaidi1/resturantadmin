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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid("id");
            $table->primary("id");
            $table->text("name");
            $table->string("logo");
            $table->text("description");
            $table->text("meta_description");
            $table->text("meta_title");
            $table->string("meta_logo");
            $table->string("keywords");
            $table->boolean("status");
            $table->string("resturant_id");
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('categories');
    }
};
