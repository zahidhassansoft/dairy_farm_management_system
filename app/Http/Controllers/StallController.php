<?php

namespace App\Http\Controllers;

use App\Stall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('stalls')->orderBy('stall_no')->get();
        $data = DB::select('select s.id,s.status, s.stall_no,s.details, COUNT(sl.stall_no) as stall, s.max_availity from stalls s
        left join stall_ledger as sl on s.id = sl.stall_no
        where sl.status = "Available"
        GROUP by s.stall_no,s.status,s.details,s.id,s.max_availity  ORDER by stall_no asc');
        return view('admin.stall.index', compact('data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stall.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stall_no' => 'required|unique:stalls',
        ]);

        $data = new Stall();
        $data->stall_no = $request->stall_no;
        $data->details = $request->details;
        $data->max_availity  = 10;
        $data->status  = "1";
        $data->save();



        // session()->flash('success','Data Store Successfully');

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
        $data = Stall::find($id);
        return view('admin.stall.edit', compact('data'));
        // return $data;
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
        $validatedData = $request->validate([
            // 'stall_no' => 'unique:stalls',
        ]);

        $data = Stall::findorfail($id);
        $data->stall_no = $request->stall_no;
        $data->details = $request->details;
        $data->max_availity  = 10;
        if ($data->save()) {
            return Redirect()->back()->with('message', 'Data Updated successfully');
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
        $data = Stall::find($id);
        if ($data->delete()) {
            return Redirect()->back()->with('message', 'Data deleted successfully');
        }
    }
}
