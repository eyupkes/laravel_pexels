<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImageLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_links', function (Blueprint $table) {
            $table->id();
            $table->integer('photographer_id');
            $table->integer('photos_id'); 
            $table->integer('original');
            $table->integer('large2x');
            $table->integer('large');
            $table->integer('medium');
            $table->integer('small');
            $table->integer('portrait');
            $table->integer('landscape');
            $table->integer('tiny'); 
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
        Schema::dropIfExists('image_links');
    }
}
 