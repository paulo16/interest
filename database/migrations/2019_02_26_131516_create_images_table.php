<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->string('photo_local_link')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('album_id')->nullable();
            $table->timestamps();
        });


        Schema::table('images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['album_id']);
        });
        Schema::dropIfExists('images');
    }
}
