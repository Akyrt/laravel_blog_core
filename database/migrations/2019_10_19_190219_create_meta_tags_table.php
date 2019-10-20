<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'meta_tags', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('post_id')->unsigned();
                $table->string('title', 100);
                $table->string('description', 180);
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
        Schema::dropIfExists('meta_tags');
    }
}
