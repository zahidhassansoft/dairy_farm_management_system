<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedInformationTable extends Migration
{
    public function up()
    {
        Schema::create('bed_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('BedNo');
            $table->string('FloorNo');
            $table->string('CabinNo');
            $table->string('KindsofBed');
            $table->decimal('ChargePerDay', 10, 2);
            $table->tinyInteger('isBooked')->default(0);
            $table->decimal('AdminCharge', 10, 2);
            $table->string('BedFacilities');
            $table->decimal('AdvanceAmt', 10, 2);
            $table->string('UserName');
            $table->string('Description');
            $table->decimal('ServiceCharge', 10, 2);
            $table->tinyInteger('PCorTk')->default(0);
            $table->tinyInteger('Status')->default(0);
            $table->string('BedType');
            $table->tinyInteger('PaidType')->default(0);
            $table->string('SubSubPno');
            $table->decimal('AdmissionCharge', 10, 2);
            $table->string('BlockNo');
            $table->decimal('RefAmt', 10, 2);
            $table->string('REfPcOrTk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bed_information');
    }
}