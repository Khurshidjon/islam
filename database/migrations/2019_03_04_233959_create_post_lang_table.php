<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('lang_id');
            $table->string('title');
            $table->text('description');
            $table->longText('content');
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
        Schema::dropIfExists('post_lang');
    }
}
