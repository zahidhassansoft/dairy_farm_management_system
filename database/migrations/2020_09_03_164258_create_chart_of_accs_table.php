<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartOfAccsTable extends Migration
{
    public function up()
    {
        Schema::create('chart_of_accs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Code');
            $table->string('Description');
            $table->string('Contra_Code');
            $table->string('UserName');
            $table->tinyInteger('Status')->default(0);
            $table->tinyInteger('SlNo')->default(0);
            $table->tinyInteger('WillShow')->default(0);
            $table->string('AcType');
            $table->decimal('ShowPC', 10, 2);
            $table->string('GroupName');
            $table->tinyInteger('GroupSlNo')->default(0);
            $table->string('FCGPHead');
            $table->string('FCDtlsHead');
            $table->tinyInteger('FCGPHeadSl')->default(0);
            $table->tinyInteger('FCDtlsHeadSl')->default(0);
            $table->string('Alias1');
            $table->string('Alias2');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chart_of_accs');
    }
}