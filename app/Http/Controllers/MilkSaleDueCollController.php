<?php

namespace App\Http\Controllers;

use App\MilkParlor;
use App\MilkSaleDueColl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class MilkSaleDueCollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MilkSaleDueColl::where('come_from','Due Coll')
        ->get();
        return view('admin.milk_sale_due_coll.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.milk_sale_due_coll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('salemilk')->max('RefNo')+1;
        $accno = DB::table('salemilk')->max('AccNo')+1;
        $pdLeft = str_pad($id, 4, '0', STR_PAD_LEFT);

        $data = new MilkSaleDueColl();
        $data->InvoiceNo = $request->InvNo;
        $data->InvoiceDate = $request->InvDate;
        $data->AccNo = $accno;
        $data->RefNo = $pdLeft;
        $data->RefDate = Carbon::parse($request->PaidDate);
        $data->Name = $request->CustomerName;
        $data->MobileNo = $request->Phone;
        $data->Email = $request->Email;
        $data->Address = $request->Address;
        $data->Litre = "0";
        $data->PriceLitre = "0";
        $data->Total = "0";
        $data->Paid = $request->Receive;
        $data->Due = $request->RestDueAmount;
        $data->come_from = "Due Coll";
        $data->remarks = $request->Remarks;
        if ($data->save()) {
            return Redirect()->back()->with('message', 'Data saved successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MilkSaleDueColl::find($id);
        // return $data;
        return view('admin.milk_sale_due_coll.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $data = MilkSaleDueColl::find($id);
        $data->InvoiceNo = $request->InvNo;
        $data->InvoiceDate = $request->InvDate;
        $data->AccNo = $request->AccNo;
        $data->RefDate = Carbon::parse($request->PaidDate);
        $data->Name = $request->CustomerName;
        $data->MobileNo = $request->Phone;
        $data->Email = $request->Email;
        $data->Address = $request->Address;
        $data->Litre = "0";
        $data->PriceLitre = "0";
        $data->Total = "0";
        $data->Paid = $request->Receive;
        $data->come_from = "Due Coll";
        $data->remarks = $request->Remarks;
        if ($data->update()) {
            return Redirect('milksaleduecoll')->with('message', 'Data updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MilkSaleDueColl::find($id);
        if ($data->delete()) {
            return Redirect('milksaleduecoll')->with('message', 'Data updated successfully');
        }
    }

    public function milksaleduecoll(Request $request)
    {
        return DB::select('select InvoiceNo, Name,MobileNo ,DATE_FORMAT(InvoiceDate, "%Y-%m-%d") as InvoiceDate, SUM(Total-Paid) as DueAmt,AccNo,Email,Address from salemilk where concat(InvoiceNo, Name,MobileNo) like "%' . $request->param . '%" group by  InvoiceNo, Name,MobileNo having DueAmt != 0');
    }
}
