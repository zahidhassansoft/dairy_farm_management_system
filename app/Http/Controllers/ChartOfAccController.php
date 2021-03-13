<?php

namespace App\Http\Controllers;

use App\ChartOfAcc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ChartOfAccController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = ChartOfAcc::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.chartofacc.index', compact('data'));
    }

    public function create()
    {
        return view('admin.chartofacc.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $chartofacc = ChartOfAcc::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/chartofaccs'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = ChartOfAcc::find($id);
        return view('admin.chartofacc.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $chartofacc->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/chartofaccs');
    }

    public function destroy($id)
    {
        ChartOfAcc::find($id)->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/chartofaccs');
    }
}
