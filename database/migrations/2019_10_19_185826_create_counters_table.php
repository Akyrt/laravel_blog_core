<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'counters', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('post_id')->unsigned();
                $table->integer('visits')->default(0);
                $table->integer('likes')->default(0);
                $table->integer('dislikes')->default(0);
                $table->timestamps();

                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
