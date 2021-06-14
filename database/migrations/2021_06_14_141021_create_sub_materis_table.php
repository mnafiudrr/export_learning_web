<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_materis', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('materi_id')->nullable();
            $table->foreign('materi_id')->references('id')->on('materis');

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
        Schema::dropIfExists('sub_materis');
    }
}
