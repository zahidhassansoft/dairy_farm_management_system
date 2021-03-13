<?php

namespace App\Http\Controllers;

use App\MonitoringService;
use App\MonitorLedger;
use App\RoutineMonitor;
use App\Stall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutineMonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT r.id, r.monitoring_date,r.animal_id,r.note,s.stall_no,r.animal_id from routine_monitor r inner join stalls s on r.stall_no = s.id');
        return view('admin.routine_monitor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stall = Stall::orderby('stall_no')->get();
        $monitoringservice = MonitoringService::get();
        return view('admin.routine_monitor.create', compact('stall', 'monitoringservice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $monitoring_date =  Carbon::parse($request->date);
        $image = $request->animal_image;
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "frontend/images/monitor";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $image_url = "N/A";
        }
        $mid = RoutineMonitor::create([
            'stall_no' => $request->stall_no,
            'animal_id' => $request->animalId,
            'weight' => $request->weight,
            'height' => $request->height,
            'milk_per_day' => $request->milk_per_day,
            'monitoring_date' => $request->date,
            'note' => $request->note,
            'reporter' => auth()->user()->name,
            'image' => $image_url,
        ]);
        foreach ($request->service_name as $key => $value) {
            $data = MonitorLedger::create([
                'monitorId' => $mid->id,
                'service_name' => $request->service_name[$key],
                'result' => $request->result[$key],
                'time' => $request->monitoring_time[$key],
            ]);
        }
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
        $data = RoutineMonitor::with('getStall')
            ->with('routine_monitor')
            ->find($id);
        return view('admin.routine_monitor.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RoutineMonitor::with('routine_monitor')->find($id);
        // return $data;
        $stall = Stall::orderby('stall_no')->get();
        $monitoringservice = MonitoringService::get();
        return view('admin.routine_monitor.edit', compact('stall', 'monitoringservice', 'data'));
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
        // $monitoring_date =  Carbon::parse($request->date);
        $image = $request->animal_image;
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "frontend/images/monitor";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $image_url = "N/A";
        }
        $mid = RoutineMonitor::whereId($id)->update([
            'stall_no' => $request->stall_no,
            'animal_id' => $request->animalId,
            'weight' => $request->weight,
            'height' => $request->height,
            'milk_per_day' => $request->milk_per_day,
            'monitoring_date' => $request->date,
            'note' => $request->note,
            'reporter' => auth()->user()->name,
            'image' => $image_url,
        ]);
        foreach ($request->service_name as $key => $value) {
            $data = MonitorLedger::whereId($id)->update([
                'service_name' => $request->service_name[$key],
                'result' => $request->result[$key],
                'time' => $request->monitoring_time[$key],
            ]);
        }
        return Redirect('routinemonitor')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RoutineMonitor::with('routine_monitor')->find($id);
        if ($data->delete()) {
            return Redirect('routinemonitor')->with('message', 'Data deleted successfully');
        }
    }
}
