<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'menu_items', function (Blueprint $table) {
            $table->id();

            $table->string('label');

            $table->text('link')->nullable();

            $table->string('type',12)->nullable();//url,page,route

            $table->unsignedBigInteger('parent')->nullable()->index();

            $table->integer('sort')->default(0);

            $table->string('class')->nullable();

            $table->unsignedBigInteger('menu')->index()->nullable();

            $table->integer('depth')->default(0);

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
        Schema::dropIfExists( 'menu_items');
    }
}
