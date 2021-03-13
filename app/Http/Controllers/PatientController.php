<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = Patient::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.patient.index', compact('data'));
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'PatientName' => 'required',
            'TelephoneNo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('RegNo,RegDate,AgeDetail,PostedBy');
        $lastid = DB::table('patientregistration')->pluck('id')->last()+1;
        $date =now()->format('yym');
        $invformate = str_pad($date, 9, "0", STR_PAD_RIGHT);
        $data['RegNo'] = $invformate+$lastid;
        $data['RegDate'] = now()->format('yy-m-d');
        $data['AgeDetail'] = $request->AgeYear.' Years '.$request->AgeMon.' Months '.$request->AgeDay.' days';
        $data['PostedBy'] = auth()->user()->username.' '.now();
        $patient = Patient::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/patients/create'); 
    }

    public function show(Patient $patient)
    {
        //
    }

    public function edit(Patient $patient)
    {
        $data = Patient::find($patient->id);
        return view('admin.patient.edit', compact('data'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make(request()->all(), [
            'TelephoneNo' => 'required',
            'PatientName' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('AgeDetail,PostedBy');
        $data['AgeDetail'] = $request->AgeYear.' Years '.$request->AgeMon.' Months '.$request->AgeDay.' days';
        $data['PostedBy'] = auth()->user()->username.' '.now();
        $patient->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/patients/create');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/patients');
    }
}
