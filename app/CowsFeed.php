<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CowsFeed extends Model
{
    protected $table = 'cows_feed';
    protected $guarded = [];

    public function cows_feed()
    {
        return $this->hasMany(FeedLedger::class,'feedId');
    }
    public function stall()
    {
        return $this->belongsTo(Stall::class,'stall_no');
    }

    // protected $fillable = [
    //     'stall_no','cow_no','date','note','food_item','item_quantity','unit','feedingTime'
    // ];
}
