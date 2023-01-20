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
        Schema::create('goodstores', function (Blueprint $table) {

            $table->uuid("id");
            $table->primary("id");
            $table->float("quantity");
            $table->float("min_quantity");
            $table->string("good_id")->nullable();
            $table->foreign("good_id")->references("id")->on("goods")->onDelete("set null")->onUpdate("cascade");
            $table->string("storehouse_id")->nullable();
            $table->foreign("storehouse_id")->references("id")->on("storehouses")->onDelete("set null")->onUpdate("cascade");
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
        Schema::dropIfExists('goodstores');
    }
};
