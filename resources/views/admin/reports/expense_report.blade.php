@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-area-chart" aria-hidden="true"></i> Office Expense Report By Date</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Office Expense Report By Date
            </li>
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
                                <div class="panel-heading"><i class="fa fa-calendar"></i> Date Range</div>
                                <div class="panel-body pb250">
                                    <div class="col-md-4">
                                        <input name="date_from" value="" id="date_from" class="form-control fromdate" placeholder="Seelct Your Date From" type="text" selected="" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <input name="date_to" value="" id="dateTo" class="form-control todate" placeholder="Seelct Your Date To" type="text" selected="" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <button type="submit" class="btn btn-success btn100"><i class="fa fa-search"></i> Search</button> -->
                                        <a class="btn btn-success btn100" data-toggle="collapse" onclick="getTransactionList()" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                <!-- <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div> -->
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <h1><i class="fa fa-print" onclick="print()" aria-hidden="true"></i></h1>
                            </button>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <h3>Dairy Farm Management System</h3>
                            <h4>Office Expense Reports</h4>
                            <label type="text" name="fromdate" id="fromdate"> </label>
                            - <label type="text" name="todate" id="todate"> </label>
                        </div>

                        <table class="table table-striped table-bordered table-sm" id="table-example">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Date</th>
                                    <th>Expense Purpose</th>
                                    <th>Details</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="donorList"></tbody>
                        </table>
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

    var FromEndDate = new Date();
    $('#date_from').on('change', function() {
        var fromStartDate = $('#date_from').val();
        $('#dateTo').datepicker({
            format: 'dd/mm/yyyy',
            startDate: fromStartDate,
            endDate: FromEndDate,
            autoclose: true,
        });
    })

    function getTransactionList() {
        var from = $('.fromdate').val();
        var to = $('.todate').val();
        var d = from.split("/");
        var t = to.split("/");

        fromDate = d[2] + "-" + d[1] + "-" + d[0];
        toDate = t[2] + "-" + t[1] + "-" + t[0];

        $('#fromdate').text(from);
        $('#todate').text(to);
        $.ajax({
            type: "GET",
            url: "getofficeexpense/" + fromDate + "/" + toDate,
            dataType: "Json",
            data: {

            },
            success: function(data) {
                console.log(data[0].fromdate);
                console.log(data[0].todate);

                $(".donorList").empty();
                var ttl = 0;
                $.each(data, function(key, item) {
                    ttl += item.total_amount;
                    var rows = "<tr class='mainCode'>" +
                        "<td>" + (key + 1) + "</td>" +
                        "<td>" + item.date + "</td>" +
                        "<td>" + item.purpose + "</td>" +
                        "<td>" + item.details + "</td>" +
                        "<td class='text-right'>" + number_format(item.total_amount) + " ৳</td>" +
                        "</tr>";
                    $('.donorList').append(rows);
                });

                var rows = "<tr class='mainCode'>" +
                    "<td class='text-right' colspan='4'><b>Total Amount </b></td>" +
                    "<td class='text-right'><b>" + number_format(ttl) + " ৳</b></td>" +
                    "</tr>";
                $('.donorList').append(rows);
            },
        });
    };

    function editAccount(id) {
        $.ajax({
            type: "GET",
            dataType: "Json",
            url: "transaction/edit/" + id,
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>
@endsection