<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensePurpose extends Model
{
    protected $table = 'expens_purposes';
    protected $fillable =['name'];
}
