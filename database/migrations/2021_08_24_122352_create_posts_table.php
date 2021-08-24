<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('slug')->unique();
            $table->longText('title');
            $table->longText('subtitle')->nullable();
            $table->longText('content_raw')->nullable();
            $table->longText('content_html');
            $table->string('image');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->boolean('is_draft')->default(1);
            $table->timestamp('published_at')->nullable()->index();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('layout')->nullable();
            $table->string('seo_title');
            $table->string('keyphrase')->nullable();
            $table->longText('meta_description');
            $table->boolean('is_active_table_content')->default(true);
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
        Schema::dropIfExists('posts');
    }
}
