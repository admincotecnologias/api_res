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
            $table->string('operative',500)->default('');
            $table->string('finance',500)->default('');
            $table->string('observations',500)->default('');
            $table->string('reply_txt',500)->default('');
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
