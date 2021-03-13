<?php

namespace App\Http\Controllers;

use App\DiagnosisDueColl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class DiagnosisDueCollController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $data = DiagnosisDueColl::orderBy('invDate', 'desc')->paginate(20);
        return view('admin.diagnosisduecoll.index', compact('data'));
    }
    
    public function create()
    {
        $banks = DB::select('select name from bankinfo');
        return view('admin.diagnosisduecoll.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $invoiceMasterId = DB::transaction(function () use ($request) {
            $lastid = DB::table('invpaid')->pluck('id')->last()+1;
            $invdate =now()->format('ym');
            $invformate = str_pad($invdate, 9, "0", STR_PAD_RIGHT);
            $invoice_no = "DC".($invformate+$lastid);
            $invoiceMaster = DiagnosisDueColl::create([
                'TrNo' => $invoice_no,
                'InvNo' =>  request()->input('InvNo'),
                'InvDate' => request()->input('InvDate'),
                'PaidDate' => request()->input('PaidDate'),
                'Less' => request()->input('Less'),
                'LessFrom' => request()->input('LessFrom'),
                'CashAmt' => request()->input('CashAmt'),
                'CardAmt' => request()->input('CardAmt'),
                'CardNo' => request()->input('CardNo'),
                'CardBank' => request()->input('CardBank'),
                'ChequeAmt' => request()->input('ChequeAmt'),
                'ChqNo' => request()->input('ChqNo'),
                'ChqBank' => request()->input('ChqBank'),
                'PaidAmt' => request()->input('PaidAmt'),
                'Remarks' => request()->input('Remarks'),
                'PatientId' => 0,
                'RegNo' => 0,
                'BrokerId' => 1,
                'UserName' => auth()->user()->username,
            ]);
            return $invoiceMaster->id;
        });
        $data=DiagnosisDueColl::find($invoiceMasterId);
        return redirect('/diagnosis-duecoll/'.$invoiceMasterId)->with(['data' => $data]);
    }

    public function show(DiagnosisDueColl $diagnosis_duecoll)
    {
        $title = "Diagnosis Due Collection";
        $data = DiagnosisDueColl::find($diagnosis_duecoll->id);
        return view('admin.diagnosisduecoll.invoice', compact('data','title'));
    }

    public function edit(DiagnosisDueColl $diagnosis_duecoll)
    {
        $banks = DB::select('select name from bankinfo');
        $data = DiagnosisDueColl::find($diagnosis_duecoll->id);
        return view('admin.diagnosisduecoll.edit', compact('data','banks'));
    }

    public function update(Request $request, DiagnosisDueColl $diagnosis_duecoll)
    {
        $invoiceMasterId = DB::transaction(function () use ($request, $diagnosis_duecoll) {
            $invoice_no = request()->input('TrNo');
            $invoiceMaster = DiagnosisDueColl::whereId($diagnosis_duecoll->id)->update([
                'TrNo' => $invoice_no,
                'InvNo' =>  request()->input('InvNo'),
                'InvDate' => request()->input('InvDate'),
                'PaidDate' => request()->input('PaidDate'),
                'Less' => request()->input('Less'),
                'LessFrom' => request()->input('LessFrom'),
                'CashAmt' => request()->input('CashAmt'),
                'CardAmt' => request()->input('CardAmt'),
                'CardNo' => request()->input('CardNo'),
                'CardBank' => request()->input('CardBank'),
                'ChequeAmt' => request()->input('ChequeAmt'),
                'ChqNo' => request()->input('ChqNo'),
                'ChqBank' => request()->input('ChqBank'),
                'PaidAmt' => request()->input('PaidAmt'),
                'Remarks' => request()->input('Remarks'),
                'PatientId' => 0,
                'RegNo' => 0,
                'BrokerId' => 1,
                'UserName' => auth()->user()->username,
            ]);
            return $diagnosis_duecoll->id;
        });
        $data=DiagnosisDueColl::find($invoiceMasterId);
        return redirect('/diagnosis-duecoll/'.$invoiceMasterId)->with(['data' => $data]);
    }

    public function destroy(DiagnosisDueColl $diagnosis_duecoll)
    {
        $diagnosis_duecoll->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/diagnosis-duecoll');
    }
}
