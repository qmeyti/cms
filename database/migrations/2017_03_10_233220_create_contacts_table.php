<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('subject', 255);
            $table->string('mobile', 12)->nullable();
            $table->text('message')->nullable();
            $table->boolean('seen')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contacts');
    }
}
