<?php

namespace App\Http\Controllers;

use App\DrInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class DrInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = DrInfo::orderBy('created_at', 'desc')->get();
        return view('admin.drinfo.index', compact('data'));
    }

    public function create()
    {
        return view('admin.drinfo.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'DrCode' => 'required|unique:dr_infos,DrCode',
            'DeptName' => 'required',
            'NoOfPtPerday' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('UserName');
        $data['UserName']=auth()->user()->username;
        $drinfo = DrInfo::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/drinfos'); 
    }

    public function show(DrInfo $drinfo)
    {
        //
    }

    public function edit(DrInfo $drinfo)
    {
        $data = DrInfo::find($drinfo->id);
        return view('admin.drinfo.edit', compact('data'));
    }

    public function update(Request $request, DrInfo $drinfo)
    {
        $validator = Validator::make(request()->all(), [
            'DrCode' => 'required|unique:dr_infos,DrCode,'.$drinfo->id,
            'DeptName' => 'required',
            'NoOfPtPerday' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('UserName');
        $data['UserName']=auth()->user()->username;
        $drinfo->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/drinfos');
    }

    public function destroy(DrInfo $drinfo)
    {
        $drinfo->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/drinfos');
    }
}
