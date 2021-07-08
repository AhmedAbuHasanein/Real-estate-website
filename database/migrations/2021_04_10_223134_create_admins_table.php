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

            $table->boolean('add_admin')->default(false);
            $table->boolean('update_admin')->default(false);;
            $table->boolean('delete_admin')->default(false);;
            $table->boolean('show_admin')->default(false);;

            $table->boolean('add_realestate_type')->default(false);;
            $table->boolean('update_realestate_type')->default(false);;
            $table->boolean('delete_realestate_type')->default(false);;
            $table->boolean('show_realestate_type')->default(false);;

            $table->boolean('delete_realestate')->default(false);;
            $table->boolean('show_realestate')->default(false);;

            $table->boolean('delete_user')->default(false);;
            $table->boolean('show_user')->default(false);;

            $table->boolean('delete_company')->default(false);;
            $table->boolean('show_company')->default(false);;


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
