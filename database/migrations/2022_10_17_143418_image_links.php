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
            $table->string('original');
            $table->string('large2x');
            $table->string('large');
            $table->string('medium');
            $table->string('small');
            $table->string('portrait');
            $table->string('landscape');
            $table->string('tiny'); 
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
 