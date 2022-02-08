<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('module_permission', function (Blueprint $table) {

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

        });

        Schema::table('pages', function (Blueprint $table) {

            $table->foreign('parent')
                ->references('id')
                ->on('pages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('author')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::table('category_page', function (Blueprint $table) {

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::table('page_tag', function (Blueprint $table) {

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('categories', function (Blueprint $table) {

            $table->foreign('parent')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreign('language')
                ->references('code')
                ->on('languages')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreign('parent_translition')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

        });

        Schema::table('slides', function (Blueprint $table) {

            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

        });


        Schema::table('settings', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

        });

        Schema::table('menu_items', function (Blueprint $table) {
            $table->foreign('menu')
                ->references('id')
                ->on('menus')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('parent')
                ->references('id')
                ->on('menu_items')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::table('faqs', function (Blueprint $table) {

            $table->foreign('parent')
                ->references('id')
                ->on('faqs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
