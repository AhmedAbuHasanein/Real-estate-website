<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProofOfOwnershipRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof__of__ownership__real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('Url');
            $table->unsignedBigInteger('realestate_id')->unique();
            $table->foreign('realestate_id')->references('id')->on('realestates');
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
        Schema::dropIfExists('proof__of__ownership__real_estates');
    }
}
