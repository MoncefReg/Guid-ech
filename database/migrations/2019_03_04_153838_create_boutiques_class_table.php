<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiquesClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    
    
    {
        Schema::create('boutiques_class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('classe');
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
        Schema::dropIfExists('boutiques_class');
    }
}
