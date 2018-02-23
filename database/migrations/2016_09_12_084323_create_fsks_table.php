<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fsks', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('fsk', ['0', '6', '12', '16', '18']);
            $table->enum('slug_fsk', ['approved-0', 'approved-6', 'approved-12', 'approved-16', 'approved-18'])->unique();
            $table->string('image_fsk'); 
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
        Schema::dropIfExists('fsks');
    }
}
