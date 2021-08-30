<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->integer('depth')->unsigned()->default(0);
            $table->text('body');
            $table->enum('status', ['spam', 'publish', 'pending', 'trash'])->default('pending');
            $table->string('mobile', 15)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('name', 80)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('comments');
    }
}
