<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('blog_categories')
                ->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('blog_posts')
                ->onDelete('cascade');
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
        Schema::table('blog_category_post', function (Blueprint $table) {
            $table->dropForeign('blog_category_post_category_id_foreign');
            $table->dropForeign('blog_category_post_post_id_foreign');
        });
        Schema::dropIfExists('blog_category_post');
    }
}
