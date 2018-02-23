<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('category', ['Action', 'Adventure', 'Animate','Comedy', 'Crime / Gangster', 'Drama', 'Fantasy', 'Fairy tale', 'Epic / Historical', 'Historical fiction', 'Horror', 'Love story', 'Musical / Dance', 'Mystery', 'Paranoid / Paranormal', 'Science Ficcion', 'Western', 'Martial arts']);
            $table->enum('slug_category', ['action', 'adventure', 'animate','comedy', 'crime-gangster', 'drama', 'fantasy', 'fairy-tale', 'epic-historical', 'historical-fiction', 'horror', 'love-story', 'musical-dance', 'mystery', 'paranoid-paranormal', 'science-ficcion', 'western', 'martial-arts'])->unique();
            $table->string('image_category');            
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
        Schema::dropIfExists('categories');
    }
}
