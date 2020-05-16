<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->enum('state', ['registered', 'assigned', 'pending', 'read', 'completed']);
            $table->integer('number_of_pages');
            $table->date('maximun_date');
            $table->timestamps();

            // LLaves Foraneas.
            // $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('dependence_id');

            // $table->foreign('category_id')
            //             ->references('id')->on('categories')
            //             ->onDelete('restrict')
            //             ->onUpdate('cascade');

            $table->foreign('dependence_id')
                        ->references('id')->on('dependences')
                        ->onDelete('restrict')
                        ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
