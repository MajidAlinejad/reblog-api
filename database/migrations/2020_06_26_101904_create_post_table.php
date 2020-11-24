<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('caption', 600);
            $table->string('status');
            $table->string('meta')->nullable();
            $table->string('tag')->nullable();
            $table->string('seo')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('img')->nullable();
            $table->string('price')->nullable();
            $table->string('off')->nullable();
            $table->string('expire')->nullable();
            $table->text('stream')->nullable(); //music or video
            $table->integer('block')->nullable(); //number of descriptions
            $table->integer('like')->nullable(); //number of likes
            $table->integer('unlike')->nullable(); //number of hates
            $table->string('attach')->nullable(); // file
            $table->string('icon')->nullable();
            $table->string('lable')->nullable();  //like "free"
            $table->string('special')->nullable(); //like btn title or price
            $table->string('link')->nullable(); //if its go to somewhere else
            $table->boolean('product')->default('0'); //product or not
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
        Schema::dropIfExists('post');
    }
}
