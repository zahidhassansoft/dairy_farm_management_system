<?php

namespace App\Http\Controllers;

use App\BedInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
class BedInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = BedInformation::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.bedinfo.index', compact('data'));
    }

    public function create()
    {
        $department = DB::select('select id, SubSubPno from Project where Pno="Clinical"');
        $canteenCat = DB::select('select SlNo, MealType from CanteenMealType');
        $bedType = DB::select('select id, BedCetagoryName from DepartmentOfBed');
        return view('admin.bedinfo.create', compact('department','canteenCat','bedType'));
    }

    public function store(Request $request)
    {
        $data = $request->except('UserName');
        $data['UserName']=auth()->user()->username;
        $bedinfo = BedInformation::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/bedinformations'); 
    }

    public function show(BedInformation $bedinformation)
    {
        //
    }

    public function edit(BedInformation $bedinformation)
    {
        $data = BedInformation::find($bedinformation->id);
        $department = DB::select('select id, SubSubPno from Project where Pno="Clinical"');
        $canteenCat = DB::select('select SlNo, MealType from CanteenMealType');
        $bedType = DB::select('select id, BedCetagoryName from DepartmentOfBed');
        return view('admin.bedinfo.edit', compact('data','department','canteenCat','bedType'));
    }

    public function update(Request $request, BedInformation $bedinformation)
    {
        $data = $request->except('UserName');
        $data['UserName']=auth()->user()->username;
        $bedinformation->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/bedinformations');
    }

    public function destroy(BedInformation $bedinformation)
    {
        $bedinformation->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/bedinformations');
    }
}
