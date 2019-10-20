<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'comments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('post_id')->unsigned();
                $table->text('content')->nullable(false);
                $table->string('author', 30)->nullable(false);
                $table->dateTime('posted_at');
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
        Schema::dropIfExists('comments');
    }
}
