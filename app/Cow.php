<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
    protected $fillable = [
        'DOB','age','weight','height','gender','color','animal_type','pregnant_status','previous_no_of_pregnant','pregnancy_time','milk_ltr_per_day','buy_from','buying_price','buy_date','stall_no','previous_vaccine_done','note','animal_image'
    ];

    protected $guarded = [];

    public function stall()
    {
        return $this->hasMany(StallLedger::class,'id');
    }
}
