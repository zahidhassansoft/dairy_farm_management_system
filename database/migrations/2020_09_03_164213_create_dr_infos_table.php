<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrInfosTable extends Migration
{
    public function up()
    {
        Schema::create('dr_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DrCode');
            $table->string('DrName');
            $table->string('PresentAdd')->nullable();
            $table->string('PermanentAdd')->nullable();
            $table->dateTime('regDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('DrDOB')->nullable();
            $table->dateTime('DrwDOB')->nullable();
            $table->string('WifeName')->nullable();
            $table->dateTime('MarriageDay')->nullable();
            $table->string('Tel')->nullable();
            $table->tinyInteger('Status')->default(0);
            $table->string('Email')->nullable();
            $table->tinyInteger('TakeCom')->default(0);
            $table->decimal('DrHonoriam', 10, 2);
            $table->decimal('DrHonoriam2', 10, 2);
            $table->decimal('Balance', 10, 2);
            $table->string('MRId')->nullable();
            $table->string('MRName')->nullable();
            $table->string('UserName');
            $table->decimal('PathCom', 10, 2)->nullable();
            $table->string('PathComIn')->nullable();
            $table->decimal('ElisaCom', 10, 2)->nullable();
            $table->string('ElisaComIn')->nullable();
            $table->decimal('ECGCom', 10, 2)->nullable();
            $table->string('ECGComIn')->nullable();
            $table->decimal('USGCom', 10, 2)->nullable();
            $table->string('USGComIn')->nullable();
            $table->decimal('XRayCom', 10, 2)->nullable();
            $table->string('XRayComIn')->nullable();
            $table->decimal('OthersCom', 10, 2)->nullable();
            $table->string('OthersComIn')->nullable();
            $table->decimal('Group0Com', 10, 2)->nullable();
            $table->string('Group0ComIn')->nullable();
            $table->string('Group0Caption')->nullable();
            $table->decimal('Group7Com', 10, 2)->nullable();
            $table->string('Group7ComIn')->nullable();
            $table->string('Group7Caption')->nullable();
            $table->decimal('Group8Com', 10, 2)->nullable();
            $table->string('Group8ComIn')->nullable();
            $table->string('Group8Caption')->nullable();
            $table->decimal('Group9Com', 10, 2)->nullable();
            $table->string('Group9ComIn')->nullable();
            $table->string('Group9Caption')->nullable();
            $table->decimal('GroupACom', 10, 2)->nullable();
            $table->string('GroupAComIn')->nullable();
            $table->string('GroupACaption')->nullable();
            $table->decimal('GroupBCom', 10, 2)->nullable();
            $table->string('GroupBComIn')->nullable();
            $table->string('GroupBCaption')->nullable();
            $table->string('DeptName')->nullable();
            $table->string('DrStatus')->nullable();
            $table->string('AreaName')->nullable();
            $table->string('RefType')->nullable();
            $table->string('DrAvailibility')->nullable();
            $table->string('DrType')->nullable();
            $table->string('DrNameInEnglish')->nullable();
            $table->string('DrNameInBangla')->nullable();
            $table->string('DesignationInEnglish')->nullable();
            $table->string('DesignationInBangla')->nullable();
            $table->string('DrUserName')->nullable();
            $table->string('PrescriptionDr')->nullable();
            $table->string('SMSDrCode')->nullable();
            $table->string('BBCLOrgCode')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Specialty')->nullable();
            $table->string('Degree')->nullable();
            $table->string('District')->nullable();
            $table->string('Thana')->nullable();
            $table->tinyInteger('SendSMS')->default(0);
            $table->decimal('NoOfPtPerday', 10, 2)->nullable();
            $table->decimal('ShowPC', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dr_infos');
    }
}
