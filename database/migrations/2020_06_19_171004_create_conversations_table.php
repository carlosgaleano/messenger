<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();

            //user
           // $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->references('id')->on('users');
            //contact
           // $table->unsignedBigInteger('contact_id');
            $table->foreignId('contact_id')->references('id')->on('users');         
            //last_mensaje
            //conten
            $table->text('last_message')->nullable();
            //string/date
            $table->dateTime('last_time')->nullable();
            $table->boolean('listen_notification')->default(true);
            $table->boolean('has_blocked')->default(false);
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
        Schema::dropIfExists('conversations');
    }
}
