<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnterpriseUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Table enterprise-user

        Schema::create('enterprise_user',function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_enterprise')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            //foreign Keys

            $table->foreign('id_user')->references('id')->on('users');
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
        //Drop Table
        Schema::dropIfExists('enterprise_user');
    }
}
