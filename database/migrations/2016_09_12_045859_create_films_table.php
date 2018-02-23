<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('trailer')->nullable;
            $table->date('year')->nullable;
            $table->time('duration')->nullable;
            $table->integer('fsk_id')->unsigned();        
            $table->integer('language_id')->unsigned();        
            $table->integer('category_id')->unsigned();       
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
        Schema::dropIfExists('films');    
    }
}
