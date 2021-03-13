@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-area-chart" aria-hidden="true"></i> Cow Sale Report By Date</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Cow Sale Report By Date
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
                                    <label class="col-sm-2 text-right">From Date</label>
                                    <div class="col-md-3">
                                        <input name="date_from" id="date_from" class="form-control fromdate isnumber" placeholder="Seelct Your Date From" type="text" selected="" autocomplete="off">
                                    </div>
                                    <label class="col-sm-2 text-right">To Date</label>
                                    <div class="col-md-3">
                                        <input name="date_to" id="dateTo" class="form-control todate isnumber" placeholder="Seelct Your Date To" type="text" selected="" autocomplete="off">
                                    </div>
                                    <div class="col-md-2">
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
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <h1><i class="fa fa-print" onclick="print()" aria-hidden="true"></i></h1>
                            </button>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <h3>Dairy Farm Management System</h3>
                            <h4> Cow Sales Report</h4>
                            <label type="text" name="fromdate" id="fromdate"> </label>
                            - <label type="text" name="todate" id="todate"> </label>
                        </div>
                        <table class="table table-striped table-bordered" id="rpt-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl No</th>
                                    <th class="text-center">Invoice No</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Stall No</th>
                                    <th class="text-center">Animal No</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Paid</th>
                                    <th class="text-center">Due</th>
                                </tr>
                            </thead>
                            <tbody class="cowsalelist"></tbody>
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
    $(document).ready(function() {
        $(".numbers").each(function() {
            $(this).format({
                format: "#,###",
                locale: "us"
            });
        });
    });

    $(".list-area").hide();

    $('#acclist').on('click', function() {
        $(".list-area").fadeToggle(1000);
    });

    $('.fromdate').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-20y',
        endDate: '0d',
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

    // var startDate = new Date($('#date_from').val());
    // $('#dateTo').datepicker({
    //     format: 'dd/mm/yyyy',
    //     endDate: '0d',
    //     startDate: startDate,
    //     autoclose: true,
    // });

    var date = 0;
    $('#dateTo').on('change', function() {
        date++;
        if (date == 3) {
            var to = $(this).val();
            var from = $('.fromdate').val();

            var startDate = new Date($('#date_from').val());
            var endDate = new Date($('#dateTo').val());

            if (startDate > endDate) {
                alert('Please Check your to date');
            } else {
                console.log(startDate);
                console.log(endDate);
            }
            date = 0;
        }
    });

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
            url: "getcowsalereport/" + fromDate + "/" + toDate,
            dataType: "Json",
            data: {

            },
            success: function(data) {
                $(".cowsalelist").empty();
                var ttl = 0;
                var paid = 0;
                var due = 0;
                $.each(data, function(key, item) {
                    ttl += item.sale_price;
                    paid += item.paid_amount;
                    due += item.due_amount;
                    var rows = "<tr class='mainCode'>" +
                        "<td>" + (key + 1) + "</td>" +
                        "<td>" + item.invoice_no + "</td>" +
                        "<td>" + item.date + "</td>" +
                        "<td>" + item.customer_name + "</td>" +
                        "<td>" + item.customer_phone + "</td>" +
                        "<td>" + item.stall_no + "</td>" +
                        "<td>" + item.animal_id + "</td>" +
                        "<td class='text-right'>" + number_format(item.sale_price) + " ৳</td>" +
                        "<td class='text-right'>" + number_format(item.paid_amount) + " ৳</td>" +
                        "<td class='text-right'>" + number_format(item.due_amount) + " ৳</td>" +
                        "</tr>";
                    $('.cowsalelist').append(rows);
                });

                var rows = "<tr class='mainCode'>" +
                    "<td class='text-right' colspan='7'><b>Total Amount </b></td>" +
                    "<td class='text-right'><b>" + number_format(ttl) + " ৳</b></td>" +
                    "<td class='text-right'><b>" + number_format(paid) + " ৳</b></td>" +
                    "<td class='text-right'><b>" + number_format(due) + " ৳</b></td>" +
                    "</tr>";
                $('.cowsalelist').append(rows);
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