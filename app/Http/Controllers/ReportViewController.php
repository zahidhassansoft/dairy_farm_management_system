<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Auth;

class ReportViewController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:report-view');
         // $this->middleware('permission:report-date');
    }

    public function getReports(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'reportType' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $condition = '';
        $request->user==0?$condition='':$condition=' and user_id='.$request->user.'';

        $title = $request->reportType;
        $datefrom = $request->dateFrom;
        $dateto = $request->dateTo;

        switch ($request->reportType) {
            case 'Phar Sales Report':
                $data = [];
                $data['details'] = DB::select('exec SP_PharSalesSMZ "'.$request->dateFrom.'", "'.$request->dateTo.'" ');
                return view('admin.report.pharsales', compact(['data','title','datefrom', 'dateto']));
                break;
            case 'Phar Sales Details Report':
                $data = [];
                $data['details'] = DB::select('exec SP_PharSalesDtls "'.$request->dateFrom.'", "'.$request->dateTo.'", "'.$request->department.'", "'.$request->salesfor.'" ');

                return view('admin.report.pharsalesdtls', compact(['data','title','datefrom', 'dateto']));
                break;

            case 'Invoice Wise Phar Sales Report':
                $data = [];
                $data['details'] = DB::select('exec SP_PharSalesInvWise "'.$request->dateFrom.'", "'.$request->dateTo.'", "'.$request->department.'", "'.$request->salesfor.'" ');
                return view('admin.report.pharsalesinv', compact(['data','title','datefrom', 'dateto']));
                break;
        }
     }

}