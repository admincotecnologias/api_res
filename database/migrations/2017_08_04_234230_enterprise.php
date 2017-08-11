<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Enterprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //enterprise table
        Schema::create('enterprise', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('photo',100)->nullable();
            $table->string('color',9)->nullable();
            $table->integer('extend')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('enterprise');
    }
}
