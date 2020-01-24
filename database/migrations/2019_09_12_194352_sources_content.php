<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SourcesContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::Create('sources_content',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('source_id');
            $table->string('authors');
            $table->timestamp('publish_date');
            $table->string('public_date');
            $table->longText('article_text');
            $table->string('top_image');
            $table->string('category');
            $table->string('logo_url');
            $table->string('title');
            $table->string('all_images');
            $table->string('article_url');
            $table->string('video_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources_content');
    }
}
