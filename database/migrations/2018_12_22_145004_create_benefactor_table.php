<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefactorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefactor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('username')->unique();
            $table->string('gender');
            $table->date('birth_date');
            $table->string('location_id');
            $table->string('address');
            $table->string('favorite_field');
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
        Schema::drop('benefactor');
    }
}
