@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content" id="dashboard-panel">
        <div class="row">
            <div class="col-md-12"> </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-red"><img src="frontend/images/employee.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Total Staff</span> <span class="info-box-number">{{$staff}}</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-aqua"><img src="frontend/images/cow.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Total Cow</span> <span class="info-box-number">{{$cows}}</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-yellow"><img src="frontend/images/calf.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Total Calf</span> <span class="info-box-number">{{$cow_calf}}</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-green"><img src="frontend/images/supplier.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Total Supplier</span> <span class="info-box-number">{{$supplier}}</span> </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-red"><img src="frontend/images/cow-stalls.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Total Stalls</span> <span class="info-box-number">{{$stalls}}</span></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-aqua"><img src="frontend/images/expense.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Expense</span> <span class="info-box-number">{{ number_format($todaysalary[0]->Salary+$todayexpense[0]->Expense+$todaycowbuy[0]->CowBuy+$todaycalfbuy[0]->CalfBuy,2)}} ৳</span> </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-yellow"><img src="frontend/images/milk.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Current Milk Stock</span> <span class="info-box-number">{{$collmilk[0]->litre}} Litre</span> </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-green"><img src="frontend/images/milk-delivery.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Collection</span> <span class="info-box-number"><i class="fa fa-bd"></i> {{number_format($todaysalecow[0]->CowSale+$todaysalemilk[0]->MilkSale,2)}} ৳</span> </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-red"><img src="frontend/images/today-milk.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Collected Milk</span> <span class="info-box-number">{{$todaym[0]->collectedMilk}} Litre</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-aqua"><img src="frontend/images/today-sold-milk.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Sold Milk</span> <span class="info-box-number">{{$todaym[0]->saleLitre}} Litre</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-yellow"><img src="frontend/images/milk-collect-amount.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Collected Milk Amount</span> <span class="info-box-number">{{number_format($todayl[0]->Paid,2)}} ৳</span> </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"> <span class="info-box-icon bg-green"><img src="frontend/images/milk-sold-amount.png"></span>
                    <div class="info-box-content"> <span class="info-box-text">Today Sold Milk Amount</span> <span class="info-box-number">{{number_format($todayl[0]->total,2)}} ৳</span> </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <i class="fa fa-info-circle"></i> Last Five Expense History</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table_scroll">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Date</th>
                                            <th>Expense Purpose</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                        <tbody>
                                            @php
                                            $total=0;
                                            @endphp
                                            @foreach($fiveexpense as $k => $data)
                                            <tr>
                                                <td class="text-center">{{$k+1}}</td>
                                                <td>{{$data->invoice_date}}</td>
                                                <td>{{$data->details}}</td>
                                                <td class="text-right">{{number_format($data->total_amount,2)}}</td>

                                                @php
                                                $total += $data->total_amount;
                                                @endphp
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-right"><b>Total</b></td>
                                                <td colspan="3" class="text-right"><b>{{number_format($total,2)}}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <i class="fa fa-info-circle"></i> Last Five Milk Sale History</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table_scroll">
                                    <table class="table table-bordered table-striped table-responsive table-hover">
                                        <tr>
                                            <th>Date</th>
                                            <th>Account No</th>
                                            <th class="text-center">Litre</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                        <tbody>
                                            @php
                                            $ttl=0;
                                            $ttlLtr=0;
                                            @endphp
                                            @foreach($fivesalemilk as $k => $data)
                                            <tr>
                                                <td>{{$data->date}}</td>
                                                <td>{{$data->account_no}}</td>
                                                <td class="text-right">{{$data->litre_sale}}</td>
                                                <td class="text-right">{{number_format($data->price_sale,2)}}</td>
                                                <td class="text-right">{{number_format($data->total,2)}}</td>

                                                @php
                                                $ttl += $data->total;
                                                $ttlLtr += $data->litre_sale;
                                                @endphp
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-right"><b>Total</b></td>
                                                <td class="text-right"><b>{{$ttlLtr}}</b></td>
                                                <td colspan="2" class="text-right"><b>{{number_format($ttl,2)}}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection