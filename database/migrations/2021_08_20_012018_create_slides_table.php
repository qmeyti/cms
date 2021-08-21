<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {

            $table->id();

            $table->timestamps();

            $table->unsignedBigInteger('slider_id')->index();

            $table->text('image');

            $table->string('header',255);

            $table->text('text1')->nullable();

            $table->text('text2')->nullable();

            $table->text('url')->nullable();

            $table->string('button1_text')->nullable();

            $table->text('button1_url')->nullable();

            $table->string('button2_text')->nullable();

            $table->text('button2_url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
