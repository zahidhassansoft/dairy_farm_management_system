<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = [
        'name','email','phone_number','nid','designation','user_type','present_address','parmanent_address','salary','image'
    ];
}
