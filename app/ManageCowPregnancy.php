<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageCowPregnancy extends Model
{
    protected $table = 'manage_cow_pregnancy';
    protected $fillable = [
        'stall_no', 'animal_id', 'pregnancy_type', 'semen_type', 'semen_push_date', 'pregnancy_start_date', 'semen_cost', 'other_cost', 'note', 'approximate_delivery_date'
    ];
}
