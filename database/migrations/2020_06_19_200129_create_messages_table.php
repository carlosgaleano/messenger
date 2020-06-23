<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            //from 
            //$table->unsignedBigInteger('from_id');
            $table->foreignId('from_id')->references('id')->on('users');

             //to 
            // $table->unsignedBigInteger('to_id');
             $table->foreignId('to_id')->references('id')->on('users');
             //content
            $table->text('content');
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
        Schema::dropIfExists('messages');
    }
}
