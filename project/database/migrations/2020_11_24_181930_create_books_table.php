<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authors_id');
            $table->string('isbn');
            $table->string('title');
            $table->integer('pages');
            $table->timestamps();

            
        });


        Schema::table('books', function($table) {
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
