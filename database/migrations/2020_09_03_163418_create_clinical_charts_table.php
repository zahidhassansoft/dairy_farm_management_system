<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalChartsTable extends Migration
{
    public function up()
    {
        Schema::create('clinical_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PCode');
            $table->string('Description');
            $table->decimal('Charge', 10, 2)->default(0.00);
            $table->decimal('ServiceCharge', 10, 2)->default(0.00);
            $table->string('SCPcorTk')->default(0);
            $table->decimal('Vat', 10, 2)->default(0.00);
            $table->string('VatPcOrTk')->default(0);
            $table->decimal('LessAmount', 10, 2)->default(0.00);
            $table->decimal('RefFee', 10, 2)->default(0.00);
            $table->string('RefFeePcOrTk')->default(0);
            $table->decimal('ReportFee', 10, 2)->default(0.00);
            $table->string('ReportFeePcOrTk')->default(0);
            $table->decimal('CollectionFee', 10, 2)->default(0.00);
            $table->string('CollectionFeePcOrTk');
            $table->decimal('OthersFee', 10, 2)->default(0.00);
            $table->string('OthersFeePcOrTk')->default(0);
            $table->tinyInteger('ReportDeliverDuration')->default(0);
            $table->string('OutTest')->default(0);
            $table->tinyInteger('CanChangePrice')->default(0);
            $table->tinyInteger('ShowDoctorCode')->default(0);
            $table->tinyInteger('CanGiveLess')->default(0);
            $table->string('ReportFileName')->default(0);
            $table->tinyInteger('IsAdjustAmt')->default(0);
            $table->tinyInteger('IsShow')->default(0);
            $table->string('UserName')->default(0);
            $table->tinyInteger('BranchId')->default(0);
            $table->string('SubSubDeptName')->default(0);
            $table->string('SubDeptName')->default(0);
            $table->string('DeptName')->default(0);
            $table->string('VaqGroup')->default(0);
            $table->string('VaqName')->default(0);
            $table->decimal('VaqPrice', 10, 2)->default(0.00);
            $table->decimal('VaqVat', 10, 2)->default(0.00);
            $table->decimal('VaqComm', 10, 2)->default(0.00);
            $table->tinyInteger('VaqStatus')->default(0);
            $table->string('OutdoorReportGroup')->default(0);
            $table->string('AccountGroup')->default(0);
            $table->string('DiscountGroup')->default(0);
            $table->string('IndoorBillGroup')->default(0);
            $table->tinyInteger('Unit')->default(0);
            $table->tinyInteger('Status')->default(0);
            $table->string('CorporateLess')->default(0);
            $table->string('AcCode')->default(0);
            $table->string('AcName')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinical_charts');
    }
}
