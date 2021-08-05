<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSsmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ssm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_sub_materi_id')->nullable();
            $table->foreign('sub_sub_materi_id')->references('id')->on('sub_sub_materis');
            $table->string('title')->nullable();
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
        Schema::dropIfExists('detail_ssm');
    }
}
