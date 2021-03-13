<?php

namespace App\Http\Controllers;

use App\PatientAdmission;
use App\BedInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class PatientAdmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = PatientAdmission::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.patientadmission.index', compact('data'));
    }

    public function create()
    {
        $department = DB::select('select SubSubPno as name from Project');
        return view('admin.patientadmission.create', compact('department'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'PRegNo' => 'required',
            'PatientName' => 'required',
            'BedNo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('PatientId,AdmissionDate,AdmissionTime');
        $lastid = DB::table('patientadmission')->pluck('id')->last()+1;
        $date =now()->format('yym');
        $invformate = str_pad($date, 9, "0", STR_PAD_RIGHT);
        $data['PatientId'] = 'PA'.($invformate+$lastid);
        $data['AdmissionDate'] = now()->format('yy-m-d');
        $data['AdmissionTime'] = now()->format('h:i:s');
        
        $bedinfo = BedInformation::where('BedNo', $request->BedNo)->update([
            'isBooked' => 1,
        ]);

        $patientadmission = PatientAdmission::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/patientadmissions/create'); 
    }

    public function getPtnAdmissionInfo(Request $request)
    {
        $data =DB::select('select * from patientadmission where concat(PatientId,PatientName, PatientTel,PatientAddress) like "%'.$request->param.'%"  order by PatientId');
        return response()->json($data);
    }
    public function show(PatientAdmission $patientadmission)
    {
        //
    }

    public function edit(PatientAdmission $patientadmission)
    {
        $data = PatientAdmission::find($patientadmission->id);
        return view('admin.patientadmission.edit', compact('data'));
    }

    public function update(Request $request, PatientAdmission $patientadmission)
    {
        $validator = Validator::make(request()->all(), [
            'PRegNo' => 'required',
            'PatientName' => 'required',
            'BedNo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('AdmissionDate,AdmissionTime');
        $data['AdmissionDate'] = now()->format('yy-m-d');
        $data['AdmissionTime'] = now()->format('h:i:s');
        $patientadmission->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/patientadmissions/create');
    }

    public function destroy(PatientAdmission $patientadmission)
    {
        $patientadmission->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/patientadmissions');
    }
}
