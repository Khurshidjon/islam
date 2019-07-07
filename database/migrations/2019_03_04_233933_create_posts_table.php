<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('img')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('seen_count')->nullable()->default(0);
            $table->date('event_date')->nullable();
            $table->unsignedInteger('status')->nullable()->default(0);
            $table->unsignedInteger('banner')->nullable()->default(0);
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
