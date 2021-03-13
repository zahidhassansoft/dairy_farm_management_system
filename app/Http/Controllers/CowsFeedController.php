<?php

namespace App\Http\Controllers;

use App\Cow;
use App\CowsFeed;
use App\FeedLedger;
use App\Stall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CowsFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('cows_feed')->get();
        $data = CowsFeed::with('cows_feed')
            ->with('stall')
            ->get();
        // $data = DB::select('SELECT c.id, DATE_FORMAT(c.date, "%Y-%m-%d") as date,s.stall_no, cow.animal_id, c.note FROM cows_feed c
        // LEFT JOIN stalls s on c.stall_no= s.id
        // left join cows cow on c.cow_no = cow.animal_id group by c.date, c.stall_no,c.cow_no order by c.created_at desc ');
        // return $data;
        return view('admin.cowsfeed.index', compact('data'));

        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stall = Stall::get();
        return view('admin.cowsfeed.create', compact('stall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // $eDate =  Carbon::parse($request->date);

        $mid = CowsFeed::create([
            'stall_no' => $request->stallno,
            'cow_no' => $request->cowid,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        foreach ($request->item as $key => $value) {
            $data = new FeedLedger();
            $data->feedId = $mid->id;
            $data->food_item = $request->item[$key];
            $data->item_quantity = $request->quantity[$key];
            $data->unit = $request->unit[$key];
            $data->feedingTime = $request->feedingtime[$key];
            $data->save();
            // return $data;
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
        $data = CowsFeed::with('cows_feed')
            ->with('stall')
            ->find($id);
        return view('admin.cowsfeed.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stall = Stall::get();
        $data = CowsFeed::with('cows_feed')->find($id);
        // return $data;
        return view('admin.cowsfeed.edit', compact('stall', 'data'));
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
        // $edate =  date('Y-m-d',strtotime($request->date));
        $d = $request->cowid;
        $t = $request->date;
        $eDate =  Carbon::parse($request->date);

        $mid = CowsFeed::whereId($id)->update([
            'stall_no' => $request->stallno,
            'cow_no' => $request->cowid,
            'date' => $eDate,
            'note' => $request->note,
        ]);
        $data = DB::select('delete FROM feed_ledger where feedId = "' . $id . '" ');
        foreach ($request->item as $key => $value) {
            $data = new FeedLedger();
            $data->feedId = $id;
            $data->food_item = $request->item[$key];
            $data->item_quantity = $request->quantity[$key];
            $data->unit = $request->unit[$key];
            $data->feedingTime = $request->feedingtime[$key];
            // return $data;
            $data->save();
        }

        // foreach ($request->item as $key => $value) {
        //     $data = FeedLedger::find($id);
        //     return $request;
        //     $data->food_item = $request->item[$key];
        //     $data->item_quantity = $request->quantity[$key];
        //     $data->unit = $request->unit[$key];
        //     $data->feedingTime = $request->feedingtime[$key];
        //     return $data;
        //     // $data->save();
        //     // return $data;
        // }
        return Redirect('cowsfeed')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CowsFeed::with('cows_feed')->find($id);
        if ($data->delete()) {
            return Redirect('cowsfeed')->with('message', 'Data deleted successfully');
        }
    }

    public function getmanimalid($id)
    {
        $data = DB::table('stall_ledger')->select(['id', 'animal_id'])->where('stall_no', $id)->groupby('animal_id')->get();
        return $data;
    }
}
