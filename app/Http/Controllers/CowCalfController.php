<?php

namespace App\Http\Controllers;

use App\AnimalType;
use App\Color;
use App\Cow;
use App\CowCalf;
use App\Stall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CowCalfController extends Controller
{
    public function index()
    {
        // $data  = CowCalf::get();
        $data = DB::select('select cow_calfs.id, cow_calfs.image, cow_calfs.animal_id, cow_calfs.date_of_birth, cows.animal_id as mother_id, cow_calfs.gender, animal_types.name as animal_type, cow_calfs.buy_from, cow_calfs.buy_price, cow_calfs.buy_date, stalls.stall_no, cow_calfs.Status, cow_calfs.user_name from cow_calfs 
        left join animal_types on cow_calfs.animal_type = animal_types.id
        left join cows on cow_calfs.mother_id = cows.id
        left join stalls on cow_calfs.stall_no = stalls.id  where cow_calfs.Status = "Available" ');
        return view('admin.cowcalf.index', compact('data'));
    }

    public function create()
    {
        $data = Color::get();
        $animal_type = AnimalType::get();
        $stall = DB::select('select s.id,s.stall_no, COUNT(sl.stall_no) as stall, s.max_availity from stalls s
        left join stall_ledger as sl on s.id = sl.stall_no
        where sl.status = "Available"
        GROUP by s.stall_no  ORDER by s.stall_no asc');
        $mId = Cow::select('id', 'animal_id')->where('gender', 'Female')->get();
        return view('admin.cowcalf.create', compact('data', 'mId', 'animal_type', 'stall'));
    }

    public function store(Request $request)
    {
        $DOB =  Carbon::parse($request->DOB);
        $buy_date =  Carbon::parse($request->buy_date);

        $no = '0';
        $no = CowCalf::max('id');
        $aid = $no + 1;
        $id = "CC-";
        $pdLeft = str_pad($aid, 4, '0', STR_PAD_LEFT);
        $animal_id = $id . $pdLeft;

        $animal_image = array();
        $animal_image['animal_id'] = $animal_id;
        $animal_image['stall_no'] = $request->stall_no;
        $animal_image['come_from'] = "Cow Calf Entry";
        $animal_image['status'] = "Available";
        $animal_image['user'] = auth()->user()->name;
        DB::table('stall_ledger')->insert($animal_image);

        $data = new CowCalf();
        $data->animal_id = $animal_id;
        $data->date_of_birth = $DOB;
        $data->mother_id = $request->mother_id;
        $data->animal_age = $request->age;
        $data->weight = $request->weight;
        $data->height = $request->height;
        $data->gender = $request->gender;
        $data->color = $request->color;
        $data->animal_type = $request->animal_type;
        $data->buy_from = $request->buy_from;
        $data->buy_price = $request->buying_price;
        $data->buy_date = $buy_date;
        $data->stall_no = $request->stall_no;
        $data->previous_vaccine = $request->previous_vaccine_done;
        $data->note = $request->note;
        $data->status = "Available";
        $data->user_name = auth()->user()->name;
        $image = $request->file('animal_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/cows/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data stored successfully');
            }
        } else {
            $data->save();
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data stored successfully');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = CowCalf::find($id);
        $color = Color::get();
        $animalType = AnimalType::get();
        $stall = DB::select('select s.id,s.stall_no, COUNT(sl.stall_no) as stall, s.max_availity from stalls s
        left join stall_ledger as sl on s.id = sl.stall_no
        where sl.status = "Available"
        GROUP by s.stall_no  ORDER by s.stall_no asc');
        $mId = Cow::select('id', 'animal_id')->where('gender', 'Female')->get();
        // return $mId;
        return view('admin.cowcalf.edit', compact('data', 'mId', 'color', 'animalType', 'stall'));
    }

    public function update(Request $request, $id)
    {
        $DOB =  Carbon::parse($request->DOB);
        $buy_date =  Carbon::parse($request->buy_date);

        $animal_image = array();
        $animal_image['animal_id'] = $request->animal_id;
        $animal_image['stall_no'] = $request->stall_no;
        $animal_image['come_from'] = "Cow Calf Entry";
        $animal_image['status'] = "Available";
        $animal_image['user'] = auth()->user()->name;
        DB::table('stall_ledger')->where('animal_id', $request->animal_id)->update($animal_image);

        $data = CowCalf::findorfail($id);
        $data->date_of_birth = $DOB;
        $data->mother_id = $request->mother_id;
        $data->animal_age = $request->age;
        $data->weight = $request->weight;
        $data->height = $request->height;
        $data->gender = $request->gender;
        $data->color = $request->color;
        $data->animal_type = $request->animal_type;
        $data->buy_from = $request->buy_from;
        $data->buy_price = $request->buying_price;
        $data->buy_date = $buy_date;
        $data->stall_no = $request->stall_no;
        $data->previous_vaccine = $request->previous_vaccine_done;
        $data->note = $request->note;
        $data->status = "Available";
        $data->user_name = auth()->user()->name;
        $image = $request->file('animal_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/cows/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            if ($data->save()) {
                return Redirect('cowcalf')->with('message', 'Data updated successfully');
            }
        } else {
            if ($data->save()) {
                return Redirect('cowcalf')->with('message', 'Data updated successfully');
            }
        }
    }

    public function destroy($id)
    {
        DB::select('delete FROM stall_ledger where animal_id = "'.$id.'" ');
        DB::select('delete FROM cow_calfs where animal_id = "'.$id.'" ');
        return Redirect('cowcalf')->with('message', 'Data deleted successfully');
    }
}
