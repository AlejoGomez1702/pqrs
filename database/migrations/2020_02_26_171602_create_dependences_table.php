<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();       
            $table->string('email')->unique()->nullable();  
            $table->string('cellphone')->unique()->nullable();   
            $table->timestamps();

            //En una dependencia hay varios usuarios.
            // $table->unsignedBigInteger('user_id')->nullable();                                        

            // $table->foreign('user_id')
            //             ->references('id')->on('users')
            //             ->onDelete('set null')
            //             ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependences');
    }
}
