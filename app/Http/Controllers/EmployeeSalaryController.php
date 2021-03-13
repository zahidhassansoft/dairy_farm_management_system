<?php

namespace App\Http\Controllers;

use App\EmployeeSalary;
use App\Staff;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = EmployeeSalary::get();
        $data = DB::select('select e.id, s.image, s.name as employee_name, e.payment_date, e.month, e.year,e.monthly_salary as salary from employee_salary e
        left join staffs s on e.employee_name = s.id');
        return view('admin.employee_salary.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Staff::select(['id', 'employeeId', 'name'])->get();
        return view('admin.employee_salary.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edate =  Carbon::parse($request->payment_date);
        $id = DB::table('employee_salary')->max('id');
        $date = now()->format('ym');
        $pformate = str_pad($date, 7, "0", STR_PAD_RIGHT);
        $paymentNo = $pformate + $id;

        $data = new EmployeeSalary();
        $data->payment_no = $paymentNo;
        $data->payment_date = $edate;
        $data->month = $request->month;
        $data->year = $request->year;
        $data->employee_name = $request->employee_id;
        $data->monthly_salary = $request->salary_amount;
        $data->note = $request->note;
        $data->employeeId = $request->eid;
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
        $employee = Staff::select(['id', 'employeeId', 'name'])->get();
        $data = EmployeeSalary::find($id);
        return view('admin.employee_salary.edit',compact('employee','data'));
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
        $edate =  Carbon::parse($request->payment_date);
        
        $data = EmployeeSalary::find($id);
        $data->payment_no = $request->payment_id;
        $data->payment_date = $edate;
        $data->month = $request->month;
        $data->year = $request->year;
        $data->employee_name = $request->employee_id;
        $data->monthly_salary = $request->salary_amount;
        $data->note = $request->note;
        if ($data->save()) {
            return Redirect('employeesalary')->with('message', 'Data updated successfully');
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
        $data = EmployeeSalary::find($id);
        if ($data->delete()) {
            return Redirect('employeesalary')->with('message', 'Data deleted successfully');
        }
    }

    public function getemployeesalary($id)
    {
        $employee = Staff::select(['id', 'employeeId', 'name', 'salary'])->find($id);
        return $employee;
    }
}
