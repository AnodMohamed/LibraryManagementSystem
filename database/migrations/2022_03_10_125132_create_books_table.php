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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image');
            $table->string('title');
            $table->string('slug');
            $table->string('edition');
            $table->string('auther');
            $table->string('publisher');
            $table->integer('bcopies');
            $table->integer('bcopiesInwarehouse');
            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(0);
            $table->timestamps();

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
