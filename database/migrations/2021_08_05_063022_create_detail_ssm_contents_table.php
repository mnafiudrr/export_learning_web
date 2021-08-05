<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSsmContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ssm_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('detail_ssm_id')->nullable();
            $table->foreign('detail_ssm_id')->references('id')->on('detail_ssm');
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
        Schema::dropIfExists('detail_ssm_contents');
    }
}
