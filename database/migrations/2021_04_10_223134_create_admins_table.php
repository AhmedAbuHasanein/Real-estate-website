<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('grade');

            $table->boolean('add_admin');
            $table->boolean('update_admin');
            $table->boolean('delete_admin');
            $table->boolean('show_admin');

            $table->boolean('add_realestate_type');
            $table->boolean('update_realestate_type');
            $table->boolean('delete_realestate_type');
            $table->boolean('show_realestate_type');

            $table->boolean('delete_realestate');
            $table->boolean('show_realestate');

            $table->boolean('delete_user');
            $table->boolean('show_user');

            $table->boolean('delete_company');
            $table->boolean('show_company');


            $table->softDeletes();
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
        Schema::dropIfExists('admins');
    }
}
