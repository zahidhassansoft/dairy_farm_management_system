<?php

namespace App\Http\Controllers;

use App\Cow;
use App\CowSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CowSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT id, invoice_no, date, customer_name, customer_phone, customer_email, address, sale_price, sum(paid_amount) as paid_amount, (sale_price-sum(paid_amount)) as due_amount  FROM cow_sales GROUP by invoice_no');
        // $data = CowSale::get();
        return view('admin.cow_sale.index',compact('data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cow_sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saleDate =  Carbon::parse($request->date);
        $no = CowSale::max('invoice_no');
        if($no == ''){
            $no = '0';
        }
        $i = substr($no,-1);
        $aid = $i + 1;
        $cDate =now()->format('ymd');
        $pdLeft = str_pad($aid, 3, '0', STR_PAD_LEFT);
        $invoice_no = $cDate . $pdLeft;

        $st =  $request->stall_no;
        $s = substr($st,-1);

        $data = DB::table('stall_ledger')->where('animal_id',$request->animal_id)->update(['status' => 'Sale']);
        $data = DB::table('cows')->where('animal_id',$request->animal_id)->update(['Status' => 'Sale']);
        $data = DB::table('cow_calfs')->where('animal_id',$request->animal_id)->update(['Status' => 'Sale']);
        
        $data = new CowSale();
        $data->invoice_no = $invoice_no;
        $data->date = $saleDate;
        $data->customer_name = $request->customer_name;
        $data->customer_phone = $request->customer_phone;
        $data->customer_email = $request->customer_email;
        $data->animal_type = $request->cowtype;
        $data->address = $request->address;
        $data->note = $request->note;
        $data->animal_id = $request->animal_id;
        $data->stall_no = $s;
        $data->sale_price = $request->total_price;
        $data->paid_amount = $request->total_paid;
        $data->due_amount = $request->due_amount;
        $data->come_from = "Sales";
        $data->user = auth()->user()->name;
        if($data->save()){
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
        $data = CowSale::find($id);
        return view('admin.cow_sale.edit',compact('data'));
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
        $saleDate =  Carbon::parse($request->date);
        $st =  $request->stall_no;
        $s = substr($st,-1);

        $data = DB::table('stall_ledger')->where('animal_id',$request->animal_id)->update(['status' => 'Sale']);
        $data = DB::table('cows')->where('animal_id',$request->animal_id)->update(['Status' => 'Sale']);
        $data = DB::table('cow_calfs')->where('animal_id',$request->animal_id)->update(['Status' => 'Sale']);
       
        $data = CowSale::find($id);
        $data->invoice_no = $request->invoice_no;
        $data->date = $saleDate;
        $data->customer_name = $request->customer_name;
        $data->customer_phone = $request->customer_phone;
        $data->customer_email = $request->customer_email;
        $data->address = $request->address;
        $data->animal_type = $request->cowtype;
        $data->note = $request->note;
        $data->animal_id = $request->animal_id;
        $data->stall_no = $s;
        $data->sale_price = $request->total_price;
        $data->paid_amount = $request->total_paid;
        $data->due_amount = $request->due_amount;
        $data->come_from = "Sales";
        $data->user = auth()->user()->name;
        if($data->save()){
            return Redirect('cowsale')->with('message', 'Data updated successfully');
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
        // return $id;
        $data = DB::table('cow_images')->where('id',$id)->update(['status' => 'Available']);
        $data = DB::table('cows')->where('id',$id)->update(['Status' => 'Available']);
        $data = DB::table('cow_calfs')->where('id',$id)->update(['Status' => 'Available']);

        $sale = CowSale::find($id);
        if($sale->delete()){
            return Redirect()->back()->with('message', 'Data deleted successfully');
        }
    }

    public function duecollection(){
        return view('admin.cow_sale.duecoll');
    }

    public function getanimalidforcow($id){
        $data = DB::table('cows')
        ->select('id','animal_id')
        ->where('status','Available')
        ->get();
        // return view('admin.milkparlor.duecollection',compact('data'));

        return $data;
    }
    public function getanimalidforcalf($id){
        $data = DB::table('cow_calfs')
        ->select('id','animal_id')
        // ->where('id',$id)
        ->get();
        // return view('admin.milkparlor.duecollection',compact('data'));

        return $data;
    }

    public function getstallimage($id){
        $data = DB::table('stall_ledger')
        ->select('stall_ledger.id','stalls.stall_no')
        ->leftJoin('stalls','stalls.id','stall_ledger.stall_no')
        ->where('animal_id',$id)
        ->get();
        return $data;
    }
}
