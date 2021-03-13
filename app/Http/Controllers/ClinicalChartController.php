<?php

namespace App\Http\Controllers;

use App\ClinicalChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class ClinicalChartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = ClinicalChart::orderBy('PCode', 'desc')->get();
        return view('admin.clinicalchart.index', compact('data'));
    }

    public function create()
    {
        $SubSubDeptName = DB::select('select SubSubPno as name from Project');
        $SubDeptName = DB::select('select SubPno as name from Project');
        $DeptName = DB::select('select pno as name from Project');
        $IndoorBill = DB::select('select BillGroup as name from indoorbillgroupinfo');
        return view('admin.clinicalchart.create', compact('SubSubDeptName','SubDeptName','DeptName','IndoorBill'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'PCode' => 'required|unique:clinical_charts,PCode',
            'Description' => 'required',
            'Charge' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $clinicalchart = ClinicalChart::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/clinicalcharts');
    }

    public function show(ClinicalChart $clinicalchart)
    {
        //
    }

    public function edit(ClinicalChart $clinicalchart)
    {
        $data = ClinicalChart::find($clinicalchart->id);
        $SubSubDeptName = DB::select('select SubSubPno as name from Project');
        $SubDeptName = DB::select('select SubPno as name from Project');
        $DeptName = DB::select('select pno as name from Project');
        $IndoorBill = DB::select('select BillGroup as name from indoorbillgroupinfo');
        return view('admin.clinicalchart.edit', compact('data','SubSubDeptName','SubDeptName','DeptName','IndoorBill'));
    }

    public function update(Request $request, ClinicalChart $clinicalchart)
    {
        $validator = Validator::make(request()->all(), [
            'PCode' => 'required|unique:clinical_charts,PCode,'.$clinicalchart->id,
            'Description' => 'required',
            'Charge' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $clinicalchart->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/clinicalcharts');
    }

    public function destroy(ClinicalChart $clinicalchart)
    {
        $clinicalchart->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/clinicalcharts');
    }
}
