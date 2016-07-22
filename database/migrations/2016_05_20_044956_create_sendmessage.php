<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendmessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
           Schema::create('users', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('phone_number');
            $table->string('token');
            $table->string('secondary_id')->nullable();
            $table->timestamps();
          
        });

       Schema::create('Messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to_number');
            $table->text('message');
            $table->integer('primary_id')->unsigned();
            $table->integer('secondary_id')->unsigned();
            $table->text('check');
            $table->foreign('primary_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
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
        Schema::drop('Messages');
        Schema::drop('users');
        
    }
}
