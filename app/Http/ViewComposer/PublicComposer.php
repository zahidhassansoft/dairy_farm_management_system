<?php
namespace App\Http\ViewComposer;

use App\Slider;
use App\TblMenuAccess;
use Illuminate\View\View;
use DB;
use Auth;
class PublicComposer
{

    public function getSlider(View $view)
    {
        $sliders = Slider::where('valid',1)->get();
        $view->with('sliders', $sliders);
    }

    public function getMenu(View $view)
    {
        $menus = TblMenuAccess::with('tblMenu')->where('user_id', Auth::user()->id)->get();
        $view->with('menus', $menus);
    }
}
