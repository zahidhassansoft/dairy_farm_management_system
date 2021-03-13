<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilkParlor extends Model
{
    protected $table = 'milkparlors';

    protected $guarded = [];

    public function milk_leger()
    {
        return $this->hasMany(milk_ledger::class,'mpId');
    }

    // protected $fillable=[
    //     'collectorName','stallNo','animalId','litre','price','totalAmount'
    // ];
}
