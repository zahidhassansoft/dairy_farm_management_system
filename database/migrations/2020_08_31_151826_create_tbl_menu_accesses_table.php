<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenuAccessesTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_menu_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('menu_id');
            $table->tinyInteger('quick_menu')->default(0);
            $table->tinyInteger('quick_menu_sl')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('tbl_menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_menu_accesses');
    }
}
