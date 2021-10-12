<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->id();
            // $table->foreignId('user_id')
            //     ->constrained()
            //     ->cascadeOnUpdate()
            //     ->cascadeOnDelete();
            // $table->foreignId('post_id')
            //     ->constrained()
            //     ->cascadeOnUpdate()
            //     ->cascadeOnDelete();

            // $table->integer('post_id')->unsigned()->default(1)
            //     ->foreign('post_id')->references('id')->on('posts')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
