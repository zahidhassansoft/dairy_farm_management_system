<?php

namespace App\Http\Controllers;

use App\CowSaleDueColl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CowSaleDueCollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CowSaleDueColl::where('come_from', 'Due Coll')
            ->get();
        return view('admin.cow_sale_due_coll.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cow_sale_due_coll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payDate =  Carbon::parse($request->PaidDate);
        $lastid = DB::table('cow_sales')->pluck('RefNo')->last() + 1;
        $date = now()->format('ym');
        $RefNo = str_pad($lastid, 4, "0", STR_PAD_LEFT);
        $invdate = now();

        $data = new CowSaleDueColl();
        $data->invoice_no = $request->InvNo;
        $data->date = $invdate;
        $data->RefNo = $RefNo;
        $data->RefDate = $payDate;
        $data->customer_name = $request->CustomerName;
        $data->customer_phone = $request->Phone;
        $data->customer_email = $request->Email;
        $data->animal_type = "-";
        $data->address = $request->Address;
        $data->note = $request->Remarks;
        $data->animal_id = "-";
        $data->stall_no = "-";
        $data->sale_price = 0.00;
        $data->paid_amount = $request->Receive;
        $data->due_amount = $request->RestDueAmount;
        $data->come_from = "Due Coll";
        $data->user = auth()->user()->name;
        // return $data;
        if ($data->save()) {
            return Redirect()->back()->with('message', 'Data stored successfully');
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
        $data = CowSaleDueColl::find($id);
        return view('admin.cow_sale_due_coll.edit', compact('data'));
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
        $payDate =  Carbon::parse($request->PaidDate);
        
        $data = CowSaleDueColl::find($id);
        $data->invoice_no = $request->InvNo;
        $data->date = $request->InvDate;
        $data->RefDate = $payDate;
        $data->customer_name = $request->CustomerName;
        $data->customer_phone = $request->Phone;
        $data->customer_email = $request->Email;
        $data->animal_type = "-";
        $data->address = $request->Address;
        $data->note = $request->Remarks;
        $data->animal_id = "-";
        $data->stall_no = "-";
        $data->sale_price = 0.00;
        $data->paid_amount = $request->Receive;
        $data->due_amount = $request->RestDueAmount;
        $data->come_from = "Due Coll";
        $data->user = auth()->user()->name;
        // return $data;
        if ($data->update()) {
            return Redirect('cowsaleduecoll')->with('message', 'Data updated successfully');
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
        $data = CowSaleDueColl::find($id);
        if ($data->delete()) {
            return Redirect()->back()->with('message', 'Data delete successfully');
        }
    }

    public function cowsaleduecoll(Request $request)
    {
        return DB::select('select invoice_no, customer_name, customer_phone ,DATE_FORMAT(date, "%Y-%m-%d") as InvoiceDate, SUM(sale_price-paid_amount) as DueAmt,customer_email,Address from cow_sales where concat(invoice_no, customer_name,customer_phone) like "%' . $request->param . '%" group by  invoice_no, customer_name,customer_phone having DueAmt != 0');
    }
}
