<?php

namespace App\Http\Controllers;

use App\AnimalType;
use Illuminate\Http\Request;
use DB;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('animal_types')->get();
        return view('admin.animal_type.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animal_type.create');
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
            'name' => 'unique:animal_types',
        ]);

        $data =new AnimalType();
        $data->name = $request->name;
        $data->status = "1";
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
        $data = AnimalType::find($id);
        return view('admin.animal_type.edit',compact('data'));
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
        $validator = $request->validate([
            'name' => 'unique:animal_types',
        ]);
        $data = AnimalType::findorfail($id);
        $data->name = $request->name;
        if ($data->save()) {
            return Redirect('animaltype')->with('message', 'Animal type updated successfully');
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
        $data = AnimalType::findorfail($id);
        if ($data->delete()) {
            return Redirect()->back()->with('message', 'Data deleted successfully');
        }
    }
}
