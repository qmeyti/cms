<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100)->nullable();
            $table->string('slug', 100)->nullable()->index();
            $table->string('language',3)->default('fa')->index();
            $table->enum('transable_id', [0, 1])->default(0);
            $table->unsignedBigInteger('parent')->nullable();  //defult = 1
            $table->unsignedBigInteger('parent_translition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
