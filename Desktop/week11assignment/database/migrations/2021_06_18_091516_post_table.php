<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Posts',function(Blueprint $table){
            $table->bigIncrements('id'); 
            $table->text('caption'); 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
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
        //
    }
}
