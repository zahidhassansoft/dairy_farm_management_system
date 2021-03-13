@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-area-chart" aria-hidden="true"></i> Milk Sales Report By Date</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Milk Sales Report By Date</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (Session::has('message'))
                        <div class="text-center alert-danger">{{ Session::get('message') }}</div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- {!! Form::open(['url' => ['/officeexpense/reports'],"target"=>"_blank",'method' =>'post','enctype'=>"multipart/form-data"]) !!} -->
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-calendar"></i> Search Field</div>
                                <div class="panel-body pb250">
                                    <div class="col-md-3">
                                        <input name="accountno" value="" id="accountno" class="form-control" placeholder="Enter Invoice No" type="text" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="date_from" value="" id="date_from" class="form-control fromdate wsit_datepicker" placeholder="Seelct Your Date From" type="text" selected="" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="date_to" value="" id="dateTo" class="form-control todate wsit_datepicker" placeholder="Seelct Your Date To" type="text" selected="" autocomplete="off">
                                    </div>
                                    <div class="col-md-2">
                                        <!-- <button type="submit" class="btn btn-success btn100"><i class="fa fa-search"></i> Search</button> -->
                                        <a class="btn btn-success btn100" data-toggle="collapse" onclick="getsalemilk()" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- {!! Form::close() !!} -->
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <h1><i class="fa fa-print" onclick="print()" aria-hidden="true"></i></h1>
                            </button>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <h3>Dairy Farm Management System</h3>
                            <h4>Milk Collected Informations Report</h4>
                            <label type="text" name="fromdate" id="fromdate"> </label>
                            - <label type="text" name="todate" id="todate"> </label>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover table-bordered" id="table-example">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Invoice No</th>
                                        <th>Sale date</th>
                                        <th>Account No</th>
                                        <th>Supplier Name</th>
                                        <!-- <th>Phone No</th> -->
                                        <th>Litre</th>
                                        <th>Price Litre</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="salaryList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
@section('script')
<script>
    $(".list-area").hide();
    $('#acclist').on('click', function() {
        $(".list-area").fadeToggle(1000);
    });
    $('#date_from').datepicker({
        format: 'dd/mm/yyyy',
        endDate: '0d',
        startDate: '-20y',
        autoclose: true,
    });

    $('#dateTo').datepicker({
        format: 'dd/mm/yyyy',
        endDate: '0d',
        autoclose: true,
    });

    function getsalemilk() {
        var accno = $('#accountno').val();
        var from = $('.fromdate').val();
        var to = $('.todate').val();
        if (accno == "") {
            accno = "1";
        } else {
            accno = $('#accountno').val();
        }

        var d = from.split("/");
        var t = to.split("/");

        fromDate = d[2] + "-" + d[1] + "-" + d[0];
        toDate = t[2] + "-" + t[1] + "-" + t[0];

        $('#fromdate').text(from);
        $('#todate').text(to);

        $.ajax({
            type: "GET",
            url: "getmilksalereport/" + fromDate + "/" + toDate + "/" + accno,
            dataType: "Json",
            data: {
                // Sale date, Account No, Supplier Name, Phone No, Litre, Price, Price Litre, Total Amount,
                //  Paid Amount, Due Amou
            },
            success: function(data) {
                console.log(data);
                $(".salaryList").empty();
                var litre = 0;
                var total = 0;
                var paid = 0;
                var due = 0;
                $.each(data, function(key, item) {
                    litre += item.litre;
                    total += item.total;
                    paid += item.paid;
                    due += item.Due;
                    var rows = "<tr class='mainCode'>" +
                        "<td>" + (key + 1) + "</td>" +
                        "<td>" + item.InvoiceNo + "</td>" +
                        "<td>" + item.InvoiceDate + "</td>" +
                        "<td>" + item.AccNo + "</td>" +
                        "<td>" + item.Name + "</td>" +
                        "<td class='text-right'>" + item.litre + "</td>" +
                        "<td class='text-right'>" + item.PriceLitre + "</td>" +
                        "<td class='text-right'>" + number_format(item.total) + " ৳</td>" +
                        "<td class='text-right'>" + number_format(item.paid) + " ৳</td>" +
                        "<td class='text-right'>" + number_format(item.Due) + " ৳</td>" +
                        "</tr>";
                    $('.salaryList').append(rows);
                });

                var rows = "<tr class='mainCode'>" +
                    "<td class='text-right' colspan='5'><b style='font-size:15px;'>Total</b></td>" +
                    "<td class='text-right'><b style='font-size:15px'>" + litre + " Litre </b></td><td></td>" +
                    "<td class='text-right'><b style='font-size:15px'>" + number_format(total) + " ৳</b></td>" +
                    "<td class='text-right'><b style='font-size:15px'>" + number_format(paid) + " ৳</b></td>" +
                    "<td class='text-right'><b style='font-size:15px'>" + number_format(due) + " ৳</b></td>" +
                    "</tr>";
                $('.salaryList').append(rows);
            },
        });
    };
</script>
@endsection