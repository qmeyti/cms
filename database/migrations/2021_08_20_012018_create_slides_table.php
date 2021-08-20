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

            $table->string('header',255);

            $table->text('image');

            $table->text('text1')->nullable();

            $table->text('text2')->nullable();

            $table->text('url')->nullable();

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
