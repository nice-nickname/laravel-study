<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('name_short', 50);
            $table->string('image', 255);
            $table->smallInteger('year_born');
            $table->smallInteger('year_died');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category', 255);
            $table->string('description', 255)->nullable();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('description', 1024);
            $table->double('price');
            $table->integer('discount')->default(0)->nullable();
            $table->integer('page_amount');
            $table->foreignId('author_id')->constrained('authors');
            $table->string('preview1', 255);
            $table->string('preview2', 255);
            $table->string('preview3', 255);
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->boolean('recommend');
            $table->string('comment', 1024);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('book_id')->constrained('books');
        });

        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('book_id')->constrained('books');
            $table->unique(['book_id', 'category_id'], 'UX_book_id_category_id');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('books');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('book_categories');
    }
}
