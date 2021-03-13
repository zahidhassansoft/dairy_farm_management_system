<?php

namespace App\Http\Controllers;

use App\CowSale;
use App\MilkParlor;
use App\Staff;
use App\Stall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Auth;

class ReportController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:report-view');
        // $this->middleware('permission:report-date');
    }
    public function salaryreport()
    {
        $eId = Staff::get();
        return view('admin.reports.salaryreport', compact('eId'));
    }

    public function getsalaryreport(Request $request, $from, $to)
    {

        $from_date = $from;
        $to_date = $to;

        $data = DB::select('SELECT s.id, s.employeeId,s.month, s.year, es.name, es.salary,es.designation, DATE_FORMAT(s.payment_date, "%Y-%m-%d") as payment_date  FROM employee_salary s
        LEFT JOIN staffs es on BINARY s.employeeId = BINARY es.employeeId where s.payment_date between "' . $from_date . '" and "' . $to_date . '" order by s.payment_date ASC ');

        // $data = DB::select('SELECT "'.$fromDate.'" as fromdate,"'.$toDate.'" as todate, DATE_FORMAT(date, "%Y-%m-%d") as date,purpose,details,total_amount FROM expenses where date between "'.$fromDate.'" and "'.$toDate.'" order by date ASC');
        return $data;
    }
    public function milkcollectreport()
    {
        $stall = Stall::get();
        return view('admin.reports.milkcollectreport', compact('stall'));
    }
    public function getmilkcollectreport(Request $request, $from, $to, $stall)
    {
        // return $stall;
        if ($stall == -1) {
            $data = DB::select('SELECT mp.id, mp.account_no, mp.collected_from,DATE_FORMAT(mp.collected_date, "%Y-%m-%d") as collected_date , st.stall_no, mp.animal_id, mp.liter, mp.price_liter, mp.total_price FROM milkparlors mp
            LEFT JOIN stalls st on mp.stall_no = st.id
            where collected_date between "' . $from . '" and "' . $to . '"  order by mp.collected_date DESC ');
            // $data = MilkParlor::whereBetween('collected_date', [$from, $to])
            //     ->get();
        } else {
            // $data = MilkParlor::whereBetween('collected_date', [$from, $to])
            //     ->where('stall_no', $stall)
            //     ->get();
            $data = DB::select('SELECT mp.id, mp.account_no, mp.collected_from, mp.collected_date, st.stall_no, mp.animal_id, mp.liter, mp.price_liter, mp.total_price FROM milkparlors mp
            LEFT JOIN stalls st on mp.stall_no = st.id
            where collected_date between "' . $from . '" and "' . $to . '" and mp.stall_no = "'.$stall.'" order by mp.collected_date DESC');
        }

        // $data = DB::select('SELECT "'.$fromDate.'" as fromdate,"'.$toDate.'" as todate, DATE_FORMAT(date, "%Y-%m-%d") as date,purpose,details,total_amount FROM expenses where date between "'.$fromDate.'" and "'.$toDate.'" order by date ASC');
        return $data;
    }
    public function milksalereport()
    {
        return view('admin.reports.milksalereport');
    }
    public function getmilksalereport(Request $request, $from, $to, $accno)
    {
        // return $stall;
        if ($accno == "1") {
            $data = DB::select('SELECT InvoiceNo,InvoiceDate, AccNo, Name,MobileNo,sum(Litre) as litre, PriceLitre, sum(Total) as total, sum(Paid) as paid, sum(Total-Paid) as Due FROM salemilk where InvoiceDate between "' . $from . '" and "' . $to . '"  GROUP by AccNo, InvoiceDate, Name order by InvoiceDate ASC ');
        } else {
            $data = DB::select('SELECT InvoiceNo, InvoiceDate, AccNo, Name,MobileNo,sum(Litre) as litre, PriceLitre, sum(Total) as total, sum(Paid) as paid, sum(Total-Paid) as Due FROM salemilk where InvoiceDate between "' . $from . '" and "' . $to . '" and InvoiceNo="' . $accno . '" GROUP by AccNo, InvoiceDate, Name order by InvoiceDate ASC ');

            // $data = DB::table('salemilk')->whereBetween('InvoiceDate', [$from, $to])
            //     ->where('AccNo', $accno)
            //     ->get();
        }
        return $data;
    }
    public function cowsalereport()
    {
        return view('admin.reports.cowsalereport');
    }
    public function getcowsalereport(Request $request, $from, $to)
    {
        $data = DB::select('SELECT cs.invoice_no,DATE_FORMAT(cs.date, "%Y-%m-%d") as date ,cs.customer_name,cs.customer_phone,cs.animal_id,s.stall_no,cs.sale_price,SUM(cs.paid_amount) as paid_amount,SUM(cs.sale_price-cs.paid_amount) as due_amount from cow_sales cs
        left join stalls as s on cs.stall_no = s.id where cs.RefDate between "' . $from . '" and "' . $to . '"  GROUP by cs.invoice_no, cs.date order by cs.date ASC ');

        // $data = CowSale::whereBetween('date', [$from, $to])
        // ->get();
        return $data;
    }
}
