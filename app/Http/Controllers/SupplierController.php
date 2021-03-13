<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::get();
        return view('admin.supplier.index',compact('data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =new Supplier();
        $data->supplier_name = $request->supplier_name;
        $data->company_name = $request->company_name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->status = "1";
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/images/supplier/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            $data->save();
            
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data stored successfully');
            }
        } else {
            if ($data->save()) {
                return Redirect()->back()->with('message', 'Data stored successfully');
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
        $data = Supplier::find($id);
        return view('admin.supplier.edit',compact("data"));
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
        $data = Supplier::findorfail($id);
        $data->supplier_name = $request->supplier_name;
        $data->company_name = $request->company_name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->status = "1";
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = "public/frontend/images/supplier/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data->image = $image_url;
            $data->save();
            
            if ($data->save()) {
                return Redirect('supplier')->with('message', 'Data updated successfully');
            }
        } else {
            if ($data->save()) {
                return Redirect('supplier')->with('message', 'Data updated successfully');
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
        $data = Supplier::findorfail($id);
        if ($data->delete()) {
            return Redirect('supplier')->with('message', 'Data deleted successfully');
        }
    }
}
