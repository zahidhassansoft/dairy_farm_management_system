<?php

namespace App\Http\Controllers;

use App\CowCalf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\InvMaster;
use App\InvDetail;
use App\Patient;
use App\DiagnosisDueColl;
use App\Expense;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $staff = DB::table('staffs')->where('status', '1')->count('id');
        $cows = DB::table('cows')->where('status', 'Available')->count('id');
        $cow_calf = DB::table('cow_calfs')->where('status', 'Available')->count('id');
        $stalls = DB::table('stalls')->where('status', '1')->count('id');
        $supplier = DB::table('suppliers')->where('status', '1')->count('id');
        $collmilk = DB::select('select sum(litre_collect-litre_sale) as litre from milk_ledger');
        $salemilk = DB::table('salemilk')->sum('Total');
        $expense = DB::table('expenses')->sum('total_amount');
        $todaym = DB::select('select sum(litre_collect) as collectedMilk, sum(litre_sale) as saleLitre from milk_ledger where date = CURDATE() ');
        $todayl = DB::select('SELECT sum(Total) as total, SUM(Paid) as Paid FROM salemilk where RefDate = curdate()');
        // return $today;
        $fiveexpense = DB::select('SELECT e.invoice_date, ep.name as details,e.total_amount FROM expenses e
        LEFT JOIN expens_purposes ep on e.purpose = ep.id
        order by e.id desc limit 5');
        $fivesalemilk = DB::select('SELECT date, account_no, litre_sale,price_sale, (price_sale*litre_sale) as total FROM milk_ledger WHERE come_from= "sales" ORDER by id DESC limit 5');

        $todaysalecow = DB::select('SELECT SUM(paid_amount) CowSale FROM cow_sales WHERE date = curdate()');
        $todaysalemilk = DB::select('SELECT SUM(Paid) MilkSale FROM salemilk WHERE RefDate= curdate()');
        
        $todaysalary = DB::select('SELECT sum(monthly_salary) as Salary FROM employee_salary WHERE payment_date = curdate() ');
        $todayexpense = DB::select('SELECT sum(total_amount) as Expense FROM expenses WHERE invoice_date = curdate(); ');
        $todaycowbuy = DB::select('SELECT SUM(buy_price) CowBuy FROM cows WHERE buy_date = curdate()');
        $todaycalfbuy = DB::select('SELECT SUM(buy_price) CalfBuy FROM cow_calfs WHERE buy_date = curdate()');
        
        return view('admin.dashboard', compact('staff', 'cows', 'cow_calf', 'stalls', 'supplier', 'collmilk', 'salemilk', 'expense', 'todaym', 'fiveexpense', 'fivesalemilk', 'todayl','todaysalary','todayexpense','todaysalecow','todaysalemilk','todaycowbuy','todaycalfbuy'));
    }
}
