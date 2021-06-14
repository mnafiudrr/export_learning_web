<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_materis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sub_materi_id')->nullable();
            $table->foreign('sub_materi_id')->references('id')->on('sub_materis');

            $table->integer('number')->nullable();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();

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
        Schema::dropIfExists('sub_sub_materis');
    }
}
