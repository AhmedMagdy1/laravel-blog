<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInternalLinksKeywordsAddPostData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internal_links_keywords', function (Blueprint $table){
            $table->string('post_slug');
            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internal_links_keywords', function (Blueprint $table){
            $table->dropForeign('internal_links_keywords_post_id_foreign');
            $table->dropColumn(['post_slug', 'post_id']);
        });

    }
}
