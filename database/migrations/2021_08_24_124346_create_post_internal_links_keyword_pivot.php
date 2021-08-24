<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostInternalLinksKeywordPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_internal_links_keyword_pivot', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->unsigned()->index();
            $table->integer('internal_links_keyword_id')->unsigned()->index('post_internal_links_keyword_pivot_index');
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
        Schema::dropIfExists('post_internal_links_keyword_pivot');
    }
}
