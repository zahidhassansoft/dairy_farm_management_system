<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoutineMonitor extends Model
{
    protected $table = 'routine_monitor';
    protected $guarded = [];

    public function routine_monitor()
    {
        return $this->hasMany(MonitorLedger::class,'monitorId');
    }

    public function getStall()
    {
        return $this->belongsTo(Stall::class,'stall_no','id');
    }

    // protected $fillable = [
    //     'stall_no','animalId','weight','height','milk_per_day','date','note','animal_image','service_name','result','monitoring_time'
    // ];
}
