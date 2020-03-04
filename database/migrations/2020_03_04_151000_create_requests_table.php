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
            $table->enum('state', ['registered', 'assigned', 'pending', 'rejected', 'completed']);
            $table->timestamps();

            // LLaves Foraneas.
            $table->unsignedBigInteger('category_id')
                                ->after('id')->nullable();

            $table->foreign('category_id')
                        ->references('id')->on('categories')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

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
