<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMateriContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_materi_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sub_materi_id')->nullable();
            $table->foreign('sub_materi_id')->references('id')->on('sub_materis');

            $table->unsignedBigInteger('content_type_id')->nullable();
            $table->foreign('content_type_id')->references('id')->on('content_types')->onUpdate('cascade')->onDelete('cascade');
            
            $table->text('value')->nullable();
            $table->integer('row')->nullable();

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
        Schema::dropIfExists('sub_materi_contents');
    }
}
