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

            $table->id();

            $table->string('title')->nullable();

            $table->string('slug')->nullable()->unique();

            $table->text('content')->nullable();

            $table->string('type', 12)->default('post');

            $table->string('language', 2)->default('fa');

            $table->text('feature_photo')->nullable();

            $table->text('excerpt')->nullable();

            $table->text('meta_description')->nullable();

            $table->string('status', 16)->default('draft');//published,trash

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
