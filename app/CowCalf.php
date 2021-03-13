<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CowCalf extends Model
{
    protected $table = 'cow_calfs';
    protected $fillable = [
        'DOB','mother_id','age','weight','height','gender','color','animal_type','buy_from','buying_price','buy_date','stall_no','previous_vaccine_done','note','animal_image'
    ];
}
