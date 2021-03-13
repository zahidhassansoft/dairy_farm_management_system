<?php

namespace App\Http\Controllers;

use App\InvMaster;
use App\InvDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class DiagnosisInvController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $data = InvMaster::with('invDetails')->orderBy('invDate', 'desc')->paginate(20);
        return view('admin.diagnosisInv.index', compact('data'));
    }
    
    public function create()
    {
        $banks = DB::select('select name from bankinfo');
        return view('admin.diagnosisInv.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $invoiceMasterId = DB::transaction(function () use ($request) {
            $lastid = DB::table('invmaster')->pluck('id')->last()+1;
            $invdate =now()->format('ym');
            $invformate = str_pad($invdate, 9, "0", STR_PAD_RIGHT);
            $invoice_no = "DI".($invformate+$lastid);
            $invoiceMaster = InvMaster::create([
                'AdmissionType' =>  request()->input('AdmissionType'),
                'DeptName' =>  "Diagnosis",
                'InvDate' => request()->input('InvDate'),
                'InvNo' => $invoice_no,
                'MobNo' => request()->input('MobNo'),
                'PatientId' => request()->input('PatientId'),
                'PatientName' => request()->input('PatientName'),
                'Age' => request()->input('Age'),
                'DOB' => request()->input('DOB'),
                'Sex' => request()->input('Sex'),
                'Address' => request()->input('Address'),
                'ConsultantCode' => request()->input('ConsultantCode'),
                'ConsultantName' => request()->input('ConsultantName'),
                'RefDrCode' => request()->input('RefDrCode'),
                'RefDrName' => request()->input('RefDrName'),
                'IsCorporate' => request()->input('IsCorporate'),
                'CorporateCode' => request()->input('CorporateCode'),
                'CorporateName' => request()->input('CorporateName'),
                'IncludePackage' => request()->input('IncludePackage'),
                'LessAmount' => request()->input('LessAmount'),
                'LessPcOrTk' => request()->input('LessPcOrTk'),
                'DiscountFrom' => request()->input('DiscountFrom'),
                'TotalLess' => request()->input('TotalLess'),
                'TotalAmt' => request()->input('TotalAmt'),
                'vatAmount' => request()->input('vatAmount'),
                'CashAmt' => request()->input('CashAmt'),
                'CardAmt' => request()->input('CardAmt'),
                'CardNo' => request()->input('CardNo'),
                'CardBank' => request()->input('CardBank'),
                'ChequeAmt' => request()->input('ChequeAmt'),
                'ChqNo' => request()->input('ChequeNo'),
                'ChqBank' => request()->input('ChequeBank'),
                'AdvanceAmt' => request()->input('AdvanceAmt'),
                'Remarks' => request()->input('Remarks'),
                'UserName' => auth()->user()->username,
            ]);

            foreach ($request->PCode as $key=>$data) {
                $data = new InvDetail();
                $data->InvMasterId = $invoiceMaster->id;
                $data->AdmissionType = $request->AdmissionType;
                $data->DeptName = "Diagnosis";
                $data->InvNo = $invoice_no;
                $data->InvDate = $request->InvDate;
                $data->ConsCode = $request->ConsultantCode;
                $data->RefDrCode = $request->RefDrCode;
                $data->PatientId = $request->PatientId;
                $data->PCode = $request->PCode[$key];
                $data->ShortDesc = $request->ShortDesc[$key];
                $data->Amount = $request->Amount[$key];
                $data->Quantity = $request->Quantity[$key];
                $data->TotalAmount = $request->TotalAmount[$key];
                $data->IsUrgent = $request->IsUrgent[$key] == 'Yes'?1:0;
                $data->RptDeliveryDate = $request->RptDeliveryDate[$key];
                $data->RptDeliveryTime = $request->RptDeliveryTime;
                $data->save();
            }
            return $invoiceMaster->id;
        });
        $data=InvMaster::with('invDetails')->find($invoiceMasterId);
        return redirect('/diagnosis-invoices/'.$invoiceMasterId)->with(['data' => $data]);
    }

    public function show(InvMaster $diagnosis_invoice)
    {
        $title = "Diagnosis Invoice";
        $data = InvMaster::with('invDetails')->find($diagnosis_invoice->id);
        return view('admin.diagnosisInv.invoice', compact('data','title'));
    }

    public function edit(InvMaster $diagnosis_invoice)
    {
        $banks = DB::select('select name from bankinfo');
        $data = InvMaster::with('invDetails')->find($diagnosis_invoice->id);
        return view('admin.diagnosisInv.edit', compact('data','banks'));
    }

    public function update(Request $request, InvMaster $diagnosis_invoice)
    {
        $invoiceMasterId = DB::transaction(function () use ($request, $diagnosis_invoice) {
            $invoice_no = request()->input('InvNo');
            $invoiceMaster = InvMaster::whereId($diagnosis_invoice->id)->update([
                'AdmissionType' =>  request()->input('AdmissionType'),
                'DeptName' =>  "Diagnosis",
                'InvDate' => request()->input('InvDate'),
                'InvNo' => $invoice_no,
                'MobNo' => request()->input('MobNo'),
                'PatientId' => request()->input('PatientId'),
                'PatientName' => request()->input('PatientName'),
                'Age' => request()->input('Age'),
                'DOB' => request()->input('DOB'),
                'Sex' => request()->input('Sex'),
                'Address' => request()->input('Address'),
                'ConsultantCode' => request()->input('ConsultantCode'),
                'ConsultantName' => request()->input('ConsultantName'),
                'RefDrCode' => request()->input('RefDrCode'),
                'RefDrName' => request()->input('RefDrName'),
                'IsCorporate' => request()->input('IsCorporate'),
                'CorporateCode' => request()->input('CorporateCode'),
                'CorporateName' => request()->input('CorporateName'),
                'IncludePackage' => request()->input('IncludePackage'),
                'LessAmount' => request()->input('LessAmount'),
                'LessPcOrTk' => request()->input('LessPcOrTk'),
                'DiscountFrom' => request()->input('DiscountFrom'),
                'TotalLess' => request()->input('TotalLess'),
                'TotalAmt' => request()->input('TotalAmt'),
                'vatAmount' => request()->input('vatAmount'),
                'CashAmt' => request()->input('CashAmt'),
                'CardAmt' => request()->input('CardAmt'),
                'CardNo' => request()->input('CardNo'),
                'CardBank' => request()->input('CardBank'),
                'ChequeAmt' => request()->input('ChequeAmt'),
                'ChqNo' => request()->input('ChequeNo'),
                'ChqBank' => request()->input('ChequeBank'),
                'AdvanceAmt' => request()->input('AdvanceAmt'),
                'Remarks' => request()->input('Remarks'),
                'UserName' => auth()->user()->username,
            ]);

            $lastid = DB::select("delete from invdetail where InvNo='".$invoice_no."' and InvDate='". request()->input('preInvDate')."'");
            foreach ($request->PCode as $key=>$data) {
                $data = new InvDetail();
                $data->InvMasterId = $diagnosis_invoice->id;
                $data->AdmissionType = $request->AdmissionType;
                $data->DeptName = "Diagnosis";
                $data->InvNo = $invoice_no;
                $data->InvDate = $request->InvDate;
                $data->ConsCode = $request->ConsultantCode;
                $data->RefDrCode = $request->RefDrCode;
                $data->PatientId = $request->PatientId;
                $data->PCode = $request->PCode[$key];
                $data->ShortDesc = $request->ShortDesc[$key];
                $data->Amount = $request->Amount[$key];
                $data->Quantity = $request->Quantity[$key];
                $data->TotalAmount = $request->TotalAmount[$key];
                $data->IsUrgent = $request->IsUrgent[$key] == 'Yes'?1:0;
                $data->RptDeliveryDate = $request->RptDeliveryDate[$key];
                $data->RptDeliveryTime = $request->RptDeliveryTime;
                $data->save();
            }
            return $diagnosis_invoice->id;
        });
        $data=InvMaster::with('invDetails')->find($invoiceMasterId);
        return redirect('/diagnosis-invoices/'.$invoiceMasterId)->with(['data' => $data]);
    }

    public function destroy(InvMaster $diagnosis_invoice)
    {
        $diagnosis_invoice->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/diagnosis-invoices');
    }
}
