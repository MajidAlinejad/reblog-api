<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // /up/down/
            $table->string('view'); // list/tiles/large/
            $table->string('base'); // img/music/video/text
            $table->string('position'); // /left/right/center/absLeft/absRight
            $table->string('seo'); // /left/right/center/absLeft/absRight
            $table->string('meta'); // /left/right/center/absLeft/absRight
            $table->string('url'); // /left/right/center/absLeft/absRight
            $table->string('meta_desc'); // /left/right/center/absLeft/absRight
            $table->text('icon')->nullable(); // custom
            // $table->string('custom')->nullable(); // custom
            // $table->string('product')->nullable(); // product custom
            $table->string('toolbar')->nullable(); // search/hashtag
            $table->string('sidebar')->nullable(); // drawer/sider
            $table->string('loader'); // loadmore/paginate/inginite
            $table->boolean('switcher'); // 1/0
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
        Schema::dropIfExists('blog');
    }
}
