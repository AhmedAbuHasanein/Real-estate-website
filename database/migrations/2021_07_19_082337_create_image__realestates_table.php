<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image__realestates', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('realestate_id');
            $table->foreign('realestate_id')->references('id')->on('realestates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image__realestates');
    }
}
