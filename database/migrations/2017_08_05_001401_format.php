<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Format extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Table Format
        Schema::create('format', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('operative')->default(null)->nullable();
            $table->longText('finance')->default(null)->nullable();
            $table->longText('observations')->default(null)->nullable();
            $table->longText('reply_txt')->default(null)->nullable();
            $table->boolean('reply')->default(false);
            $table->integer('id_week')->unsigned()->nullable();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_enterprise')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_week')->references('id')->on('week')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_enterprise')->references('id')->on('enterprise')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Table Format
        Schema::dropIfExists('format');
    }
}
