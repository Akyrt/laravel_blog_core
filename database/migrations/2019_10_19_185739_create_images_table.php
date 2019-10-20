<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'images', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('post_id')->unsigned();
                $table->string('url')->nullable(false);
                $table->enum('type', ['THUMBNAIL', 'IMAGE']);
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
        Schema::dropIfExists('images');
    }
}
