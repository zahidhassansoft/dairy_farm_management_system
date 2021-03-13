<?php

namespace App\Http\Controllers;

use App\MonitoringService;
use Illuminate\Http\Request;
use DB;

class MonitoringServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MonitoringService::get();
        return view('admin.monitoring_service.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monitoring_service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'unique:monitoring_services',
        ]);

        $data = new MonitoringService();
        $data->name = $request->name;
        if ($data->save()) {
            return Redirect()->back()->with('message', 'Data store successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getanimalid($id){
        $data = DB::table('stall_ledger')
        ->select(['id', 'animal_id'])
        ->where('stall_no', $id)
        ->where('status', 'Available')
        ->groupby('animal_id')
        ->get();
        // $data = DB::table('stall_ledger')->select(['id','animal_id'])->where('stall_no',$id)->get();
        return $data;
    }
    public function animaldetails($id){
        $data = DB::table('cows')->select(['id','date_of_birth','gender','animal_type','buy_date'])->where('id',$id)->get();
        return $data;
    }
}
