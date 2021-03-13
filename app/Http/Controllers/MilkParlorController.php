<?php

namespace App\Http\Controllers;

use App\Cow;
use App\MilkParlor;
use App\SaleMilk;
use App\Stall;
use Illuminate\Http\Request;
use DB;

class MilkParlorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stall = Stall::orderBy('stall_no', 'asc')->get();
        $cow = Cow::orderBy('stall_no', 'asc')->get();
        return view('admin.milkparlor.index', compact('stall', 'cow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('milkparlors')->max('id');
        $date = date('ym');
        $pdLeft = str_pad($id, 4, '0', STR_PAD_LEFT);
        $lnTrNo = $date . $pdLeft;
        $trno = "C" . $lnTrNo;
        $date = date('Y-M-d H:i:s');

        $mid = MilkParlor::create([
            'account_no' => $trno,
            'collected_from' => request()->input('collectorName'),
            'collected_date' => $request->collectDate,
            'stall_no' => $request->stallNo,
            'animal_id' => $request->animalId,
            'liter' => $request->litre,
            'price_liter' => $request->price,
            'total_price' => $request->totalAmount,
        ]);

        $milk = array();
        $milk['mpId'] = $mid->id;
        $milk['date'] = $request->collectDate;
        $milk['referance_no'] = $trno;
        $milk['account_no'] = $lnTrNo;
        $milk['name'] = $request->collectorName;
        $milk['litre_collect'] = $request->litre;
        $milk['litre_sale'] = "0";
        $milk['price_collect'] = $request->price;
        $milk['price_sale'] = "0";
        $milk['come_from'] = "Collected";
        // return $milk;
        DB::table('milk_ledger')->insert($milk);
        return Redirect()->back()->with('message', 'Data store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Sale Milk Invoice";
        $data = DB::select('SELECT id, InvoiceNo, InvoiceDate,Address, AccNo, Name, MobileNo, Email, Litre, PriceLitre, Total, sum(Paid) as Paid, (Total-sum(paid)) as Due FROM salemilk where InvoiceNo = "' . $id . '" GROUP by InvoiceNo');
        // $data = SaleMilk::find($id);
        // return $data;
        return view('admin.milkparlor.view', compact('data', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MilkParlor::with('milk_leger')->find($id);
        $stall = Stall::orderBy('stall_no', 'asc')->get();
        $cow = Cow::orderBy('stall_no', 'asc')->get();
        return view('admin.milkparlor.edit', compact('stall', 'cow', 'data'));
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
        $acc = request()->input('accNo');
        $trNo = substr($acc, 1, 9);

        $mid = MilkParlor::whereId($id)->update([
            'account_no' => $acc,
            'collected_from' => request()->input('collectorName'),
            'collected_date' => $request->collectDate,
            'stall_no' => $request->stallNo,
            'animal_id' => $request->animalId,
            'liter' => $request->litre,
            'price_liter' => $request->price,
            'total_price' => $request->totalAmount,
        ]);

        $data = DB::select('delete FROM milk_ledger where referance_no = "' . $acc . '" ');
        $milk = array();
        $milk['mpId'] = $id;
        $milk['date'] = $request->collectDate;
        $milk['referance_no'] = $acc;
        $milk['account_no'] = $trNo;
        $milk['name'] = $request->collectorName;
        $milk['litre_collect'] = $request->litre;
        $milk['litre_sale'] = "0";
        $milk['price_collect'] = $request->price;
        $milk['price_sale'] = "0";
        $milk['come_from'] = "Collected";
        DB::table('milk_ledger')->where('mpId', $id)->insert($milk);
        return Redirect('collectedmilklist')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MilkParlor::where('account_no', $id)->delete();
        $data =  DB::table('milk_ledger')->where('referance_no', $id)->delete();
        // return $data;
        return Redirect()->back()->with('message', 'Data deleted successfully');
    }
    public function collectedmilklist()
    {
        $data = MilkParlor::select(
            'milkparlors.id',
            'milkparlors.account_no',
            'milkparlors.collected_from',
            'milkparlors.animal_id',
            'milkparlors.liter',
            'milkparlors.price_liter',
            'milkparlors.total_price',
            'milkparlors.collected_date',
            'stalls.stall_no',
        )
            ->leftJoin("stalls", "milkparlors.stall_no", "=", "stalls.id")
            ->orderby('milkparlors.account_no', "DESC")
            ->get();
        return view('admin.milkparlor.collectedmilklist', compact('data'));
        // return $data;
    }

    public function getcowid(Request $request)
    {
        $id = $request->stallNo;
        $data = DB::table('cows')->select('animal_id')->where('stall_no', $id)
            ->where('gender', 'Female')
            ->get();
        return $data;
    }
    public function saleMilk()
    {
        $data = DB::select('select account_no, sum(litre_collect-litre_sale) as litre from milk_ledger GROUP by account_no HAVING litre>0');
        return view('admin.milkparlor.salemilk', compact('data'));
        // return $data;
    }
    public function salemilklist()
    {
        $data = DB::select('SELECT id, InvoiceNo, InvoiceDate, AccNo, Name, MobileNo, Email, Litre, PriceLitre, Total, sum(Paid) as Paid, (Total-sum(paid)) as Due FROM salemilk GROUP by InvoiceNo');
        return view('admin.milkparlor.salemilklist', compact('data'));
    }
    public function salemilkstore(Request $request)
    {
        $invoiceMasterId = DB::transaction(function () use ($request) {
            $id = DB::table('salemilk')->max('id');
            $date = date('ym');
            $pdLeft = str_pad($id + 1, 4, '0', STR_PAD_LEFT);
            $TrNo = "S" . $date . $pdLeft;
            $date = date('Y-M-d H:i:s');

            // // return $request;
            $data = array();
            $data['InvoiceNo'] = $TrNo;
            $data['InvoiceDate'] = $request->sale_date;
            $data['AccNo'] = $request->accNo;
            $data['RefNO'] = $pdLeft;
            $data['Name'] = $request->name;
            $data['MobileNo'] = $request->contact;
            $data['Email'] = $request->email;
            $data['Address'] = $request->address;
            $data['Litre'] = $request->litre;
            $data['PriceLitre'] = $request->pricelitre;
            $data['Total'] = $request->total;
            $data['Paid'] = $request->paid;
            $data['Due'] = $request->due;
            $data['come_from'] = "Sales";

            DB::table('salemilk')->insert($data);

            $data = array();
            $data['date'] = $request->sale_date;
            $data['referance_no'] = $TrNo;
            $data['account_no'] = $request->accNo;
            $data['name'] = $request->name;
            $data['litre_collect'] = "0";
            $data['litre_sale'] = $request->litre;
            $data['price_collect'] = "0";
            $data['price_sale'] = $request->pricelitre;
            $data['come_from'] = "Sales";
            // return $milk;
            DB::table('milk_ledger')->insert($data);
        });
        return Redirect()->back()->with('message', 'Data store successfully');
    }

    public function salemilk_edit($id)
    {
        $data = DB::select('select id, account_no, sum(litre_collect-litre_sale) as litre from milk_ledger GROUP by account_no,id HAVING litre>0');
        // $data = DB::select('select account_no, sum(litre_collect-litre_sale) as litre from milk_ledger GROUP by account_no HAVING litre>0');
        $sale = DB::table('salemilk')->find($id);
        // return $sale;
        return view('admin.milkparlor.salemilk_edit', compact('data', 'sale'));
    }

    public function salemilkup(Request $request, $id)
    {

        $data = array();
        $data['InvoiceNo'] = $request->invoiceNo;
        $data['InvoiceDate'] = $request->sale_date;
        $data['AccNo'] = $request->accNo;
        $data['Name'] = $request->name;
        $data['MobileNo'] = $request->contact;
        $data['Email'] = $request->email;
        $data['Address'] = $request->address;
        $data['Litre'] = $request->litre;
        $data['PriceLitre'] = $request->pricelitre;
        $data['Total'] = $request->total;
        $data['Paid'] = $request->paid;
        $data['Due'] = $request->due;
        // return $data;

        DB::table('salemilk')->where('InvoiceNo', $request->invoiceNo)->update($data);

        $milk = array();
        $milk['date'] = $request->sale_date;
        $milk['referance_no'] = $request->invoiceNo;
        $milk['account_no'] = $request->accNo;
        $milk['name'] = $request->name;
        $milk['litre_collect'] = "0";
        $milk['litre_sale'] = $request->litre;
        $milk['price_collect'] = "0";
        $milk['price_sale'] = $request->pricelitre;
        $milk['come_from'] = "Sales";
        // return $milk;
        DB::table('milk_ledger')->where('referance_no', $request->invoiceNo)->update($milk);
        return Redirect('salemilklist')->with('message', 'Data store successfully');
    }

    public function salemilkdelete($id)
    {
        DB::table('salemilk')->where('InvoiceNo', $id)->delete();
        DB::table('milk_ledger')->where('referance_no', $id)->delete();
        return Redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function getmilkinfo(Request $request)
    {

        // $data = DB::select(DB::raw('select account_no, sum(litre_collect-litre_sale) as litre,sum(price_collect) as price from milk_ledger WHERE account_no="'.$request->accNo.'" GROUP by account_no'));
        $data = DB::table('milk_ledger')
            ->select(['account_no', DB::raw('sum(litre_collect-litre_sale) as litre'), DB::raw('sum(price_collect) as price')])
            ->where('account_no', $request->accNo)
            ->groupby('account_no')
            ->get();
        return $data;
    }
    public function getmilk(Request $request)
    {

        // $data = DB::select(DB::raw('select account_no, sum(litre_collect-litre_sale) as litre,sum(price_collect) as price from milk_ledger WHERE account_no="'.$request->accNo.'" GROUP by account_no'));
        $data = DB::table('milk_ledger')
            ->select(['account_no', DB::raw('sum(litre_collect-litre_sale) as litre'), DB::raw('sum(price_collect) as price')])
            ->where('account_no', $request->accNo)
            ->groupby('account_no')
            ->get();
        return $data;
    }

    public function duecollection()
    {
        return view('admin.milkparlor.duecollection');
    }

    public function getduecollectiondata($id)
    {
        $data = DB::table('salemilk')
            ->select('InvoiceNo', 'InvoiceDate', 'AccNo', 'Name', 'MobileNo', 'Email', 'Litre', 'PriceLitre', 'Total', 'Paid', 'Due')
            ->where('InvoiceNo', $id)
            ->get();
        // return view('admin.milkparlor.duecollection',compact('data'));

        return $data;
    }

    public function getanimalno($id)
    {
        $data = DB::table('cows')->select(['id', 'animal_id'])->where('stall_no', $id)->get();
        return $data;
    }
}
