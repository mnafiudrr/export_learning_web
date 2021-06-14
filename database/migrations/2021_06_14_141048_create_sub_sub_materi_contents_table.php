<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubMateriContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_materi_contents', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('materi_id')->nullable();
            $table->foreign('materi_id')->references('id')->on('materis');

            $table->bigInteger('content_type_id')->nullable();
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
        Schema::dropIfExists('sub_sub_materi_contents');
    }
}
