<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('title')->nullable();

            $table->text('content')->nullable();

            $table->string('type',12)->default('post');

            $table->string('language',2)->default('fa');

            $table->string('feature_photo')->nullable();

            $table->unsignedBigInteger('parent')->index()->nullable();

            $table->unsignedBigInteger('author')->index();

            $table->boolean('is_translation')->default(false);

            $table->softDeletes();

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
        Schema::drop('pages');
    }
}
