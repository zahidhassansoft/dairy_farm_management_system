<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\TblMenu;
use App\TblMenuAccess;
use DB;
use Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.acl.user.index',compact('data'));
    }

    public function create()
    {
        $menus = TblMenu::where('parent_id', '=', 0)->get();
        $userRole = [];
        return view('admin.acl.user.create',compact('menus','userRole'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();
            $password = Hash::make($request->data[0]["password"]);

            $user = new User();
            $user->username = $request->data[0]["username"];
            $user->name = $request->data[0]["name"];
            $user->email = $request->data[0]["email"];
            $user->password = $password;
            $user->designation = $request->data[0]["designation"];
            $user->save();

            foreach ($request->data as $key=>$data) {
                $data = new TblMenuAccess();
                $data->user_id = $user->id;
                $data->menu_id = $request->data[$key]["menuId"];
                $data->quick_menu_sl = $request->data[$key]["menuSl"];
                $request->data[$key]["menuSl"] >0 ? $quick_menu=1:$quick_menu=0;
                $data->quick_menu = $quick_menu;
                $data->parent_menu = $request->data[$key]["parentMenu"];
                $data->save();
            }
            return response()->json(['data' => $user, 'code' => 200]);
        });
    }

    public function show($id)
    {
        $user = User::with('tblMenuAccess','tblMenuAccess.tblMenu')->find($id);
        return view('admin.acl.user.show',compact('user'));
    }


    public function edit($id)
    {
        $user = User::with('tblMenuAccess','tblMenuAccess.tblMenu')->find($id);
        $menus = TblMenu::where('parent_id', '=', 0)->get();
        $userRole = $user->tblMenuAccess->pluck('menu_id','menu_id')->all();
        
        return view('admin.acl.user.edit',compact('user','menus','userRole'));
    }


    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request,$id) {
            $input = $request->all();

            $password = Hash::make($request->data[0]["password"]);
            $user =User::find($id);
            $user->username = $request->data[0]["username"];
            $user->name = $request->data[0]["name"];
            $user->email = $request->data[0]["email"];
            $user->password = $password;
            $user->designation = $request->data[0]["designation"];
            $user->save();
            DB::table('tbl_menu_accesses')->where('user_id',$id)->delete();
            
            foreach ($request->data as $key=>$data) {
                $data = new TblMenuAccess();
                $data->user_id = $user->id;
                $data->menu_id = $request->data[$key]["menuId"];
                $data->quick_menu_sl = $request->data[$key]["menuSl"];
                $request->data[$key]["menuSl"] >0 ? $quick_menu=1:$quick_menu=0;
                $data->quick_menu = $quick_menu;
                $data->parent_menu = $request->data[$key]["parentMenu"];
                $data->save();
            }
            return response()->json(['data' => $user, 'code' => 200]);
        });
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}