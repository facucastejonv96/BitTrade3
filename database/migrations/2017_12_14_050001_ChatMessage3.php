<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatMessage3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("chatmessage" , function(Blueprint $table){
        $table->increments("id");
        $table->string("sender_mail");
        $table->string("sender_name");
        $table->text("message");
        $table->string("chat_id");
        $table->boolean('read')->default(false);
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
