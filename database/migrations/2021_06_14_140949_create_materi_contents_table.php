<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_contents', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('materi_id')->unsigned();
            $table->foreign('materi_id')->references('id')->on('materis')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('content_type_id')->nullable();
            $table->foreign('content_type_id')->references('id')->on('content_types');
            
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
        Schema::dropIfExists('materi_contents');
    }
}
