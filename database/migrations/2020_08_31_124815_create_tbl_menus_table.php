<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenusTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('name_bangla');
            $table->string('route');
            $table->tinyInteger('is_parent')->default(0);
            $table->tinyInteger('parent_id');
            $table->tinyInteger('child_status')->default(0);
            $table->string('menu_icon');
            $table->tinyInteger('valid')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_menus');
    }
}
