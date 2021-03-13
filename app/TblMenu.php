<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblMenu extends Model
{
    protected $table = 'tbl_menus';

    protected $guarded = [];

    public function tblMenuAccess()
    {
        return $this->hasMany(TblMenuAccess::class,'menu_id');
    }

    
    public function childs() {
        return $this->hasMany('App\TblMenu','parent_id','id') ;
    }
}
