<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Table files
        Schema::create('files', function(Blueprint $table) {
            $table->increments('id');
            // Schema declaration
            $table->integer('id_format')->unsigned()->nullable();
            $table->string('name');
            $table->string('path');
            $table->string('extension');
            $table->string('mime');
            $table->integer('type');
            // Constraints declaration
            $table->timestamps();

            $table->foreign('id_format')->references('id')->on('format')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Table
        Schema::dropIfExists('files');
    }
}
