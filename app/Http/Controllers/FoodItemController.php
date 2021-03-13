<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodItem;
use DB;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('food_items')->get();
        return view('admin.fooditem.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.fooditem.create');
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
            'name' => 'unique:food_items',
        ]);

        $data =new FoodItem();
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
         $data = FoodItem::findorfail($id);
        return view('admin.fooditem.edit', compact('data'));
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
            'name' => 'unique:food_items',
        ]);

        $data = FoodItem::findorfail($id);
        $data->name = $request->name;
        $data->status = "1";
        if ($data->save()) {
            return Redirect('fooditem')->with('message', 'Data Updated successfully');
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
         $data = FoodItem::findorfail($id);
        if ($data->delete()) {
            return Redirect()->back()->with('message', 'Data deleted successfully');
        }
    }
}
