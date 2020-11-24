<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects');
        });



        Schema::table('posts', function (Blueprint $table) {
            $table->bigInteger('blog_id')->unsigned()->index()->nullable();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->bigInteger('group_id')->unsigned()->index()->nullable(); //other categorize system -seniour
            $table->bigInteger('brand_id')->unsigned()->index()->nullable();


            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('group_id')->references('id')->on('groups');
        });

        Schema::table('blocks', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('specs', function (Blueprint $table) {
            $table->bigInteger('cat_id')->unsigned()->index();
            $table->bigInteger('spec_id')->unsigned()->index()->nullable();
        });

        Schema::table('details', function (Blueprint $table) {
            $table->bigInteger('spec_id')->unsigned()->index();
            // $table->bigInteger('post_id')->unsigned()->index();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::table('likes', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('saves', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign');
    }
}
