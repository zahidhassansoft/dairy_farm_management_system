<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblMenuAccess extends Model
{
    protected $table = 'tbl_menu_accesses';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tblMenu()
    {
        return $this->belongsTo('App\TblMenu', 'menu_id');
    }
}
