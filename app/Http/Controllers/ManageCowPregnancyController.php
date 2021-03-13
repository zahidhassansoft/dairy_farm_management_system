<?php

namespace App\Http\Controllers;

use App\AnimalType;
use App\ManageCowPregnancy;
use App\Stall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageCowPregnancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT r.id, s.stall_no,r.animal_id,r.pregnancy_start_date,a.name as semen_type,r.approximate_dalivery_date,r.note from manage_cow_pregnancy r inner join stalls s on r.stall_no = s.id inner join animal_types a on r.semen_type = a.id');
        return view('admin.manage_cow_pregnancy.index',compact('data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stall = Stall::orderby('stall_no')->get();
        $sementype = AnimalType::get();
        return view('admin.manage_cow_pregnancy.create',compact('stall','sementype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pregnancyDate =  Carbon::parse($request->pregnancy_start_date);
        // $pushdate =  Carbon::parse($request->semen_push_date);
        // $deliverydate = Carbon::parse($request->aprDeliverDate);

        $pregnancyDate =  $request->pregnancy_start_date;
        $pushdate =  $request->semen_push_date;
        $deliverydate = $request->aprDeliverDate;
        return $pregnancyDate;

        $data = new ManageCowPregnancy();
        $data->stall_no = $request->stall_no;
        $data->animal_id = $request->animalId;
        $data->pregnancy_type = $request->pregnancy_type;
        $data->semen_type = $request->semen_type;
        $data->semen_push_date = $pushdate;
        $data->pregnancy_start_date = $pregnancyDate;
        $data->semen_cost = $request->semen_cost;
        $data->other_cost = $request->others_cost;
        $data->note = $request->note;
        $data->approximate_dalivery_date= $deliverydate;
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
        $stall = Stall::orderby('stall_no')->get();
        $sementype = AnimalType::get();
        $data = ManageCowPregnancy::find($id);
        // return $data;
        return view('admin.manage_cow_pregnancy.edit',compact('data','stall','sementype'));
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
        $pregnancyDate =  $request->pregnancy_start_date;
        $pushdate =  $request->semen_push_date;
        $deliverydate = date('Y-m-d',strtotime($request->aprDeliverDate));
        // return $deliverydate;

        $data = ManageCowPregnancy::find($id);
        $data->stall_no = $request->stall_no;
        $data->animal_id = $request->animalId;
        $data->pregnancy_type = $request->pregnancy_type;
        $data->semen_type = $request->semen_type;
        $data->semen_push_date = $pushdate;
        $data->pregnancy_start_date = $pregnancyDate;
        $data->semen_cost = $request->semen_cost;
        $data->other_cost = $request->others_cost;
        $data->note = $request->note;
        $data->approximate_dalivery_date= $deliverydate;
        if ($data->save()) {
            return Redirect('managecowpregnancy')->with('message', 'Data updated successfully');
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
        $data = ManageCowPregnancy::find($id);
        if ($data->delete()) {
            return Redirect()->back()->with('message', 'Data store successfully');
        }
    }

    public function mcpanimalid($id){
        $data = DB::table('cows')
        ->select(['id','animal_id'])
        ->where('stall_no',$id)
        ->where('gender','Female')
        ->get();
        return $data;
    }
}
