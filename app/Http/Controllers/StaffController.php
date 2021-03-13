<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Staff;
use App\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('staffs')->get();
        return view('admin.staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Designation::get();
        $usertype = UserType::get();
        return view('admin.staff.create', compact('data', 'usertype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('staffs')->MAX('id');
        $lDate = date('ym');
        $pdLeft = str_pad($id, 4, '0', STR_PAD_LEFT);
        $employeeId = $lDate . $pdLeft;
        $date = date('Y-M-d H:i:s');
        // return $employeeId;


        $data = new Staff();
        $data->name = $request->name;
        $data->employeeId = $employeeId;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->nid = $request->nid;
        $data->gender = $request->gender;
        $data->designation = $request->designation;
        $data->user_type = $request->user_type;
        $data->present_address = $request->present_address;
        $data->parmanent_address = $request->parmanent_address;
        $data->salary = $request->salary;
        $data->joining_date = $request->joining_date;
        $data->status = 1; //1for active 0 for inactive
        
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/staffimages/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data saved successfully');
            }
        } else {
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data saved successfully');
            }
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
        $data = Staff::find($id);
        $designation = Designation::get();
        $usertype = UserType::get();
        // return $data;
        return view('admin.staff.edit', compact('data', 'designation', 'usertype'));
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
        $jdate =  Carbon::parse($request->joining_date);

        $data = Staff::find($id);
        $data->name = $request->name;
        $data->employeeId = $request->emoloyee_id;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->nid = $request->nid;
        $data->gender = $request->gender;
        $data->designation = $request->designation;
        $data->user_type = $request->user_type;
        $data->present_address = $request->present_address;
        $data->parmanent_address = $request->parmanent_address;
        $data->salary = $request->salary;
        $data->joining_date = $jdate;
        $data->status = 1; //1for active 0 for inactive

        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/staffimages/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            if ($data->save()) {
                return Redirect('staff')->with('message', 'Data updated successfully');
            }
        } else {
            if ($data->save()) {
                return Redirect('staff')->with('message', 'Data updated successfully');
            }
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
        $data = Staff::find($id);
        if ($data->delete()) {
            return Redirect('staff')->with('message', 'Data updated successfully');
        }
    }
    public function addStaff()
    {
        $data = Designation::get();
        $usertype = UserType::get();
        return view('admin.staff.addStaff', compact('data', 'usertype'));
    }

    public function staffList()
    {
        $data = DB::table('staffs')->get();
        return view('admin.staff.staffList', compact('data'));
    }

    public function userList()
    {
        $data = DB::table('staffs')->get();
        return view('admin.staff.userList', compact('data'));
    }

    public function employeeSalary()
    {
        $data = DB::table('staffs')->get();
        return view('admin.staff.employeeSalary', compact('data'));
    }
}
