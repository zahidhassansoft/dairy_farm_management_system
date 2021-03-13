@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Milk Sale Due collection</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Milk Sale Due collection</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => ['/milksaleduecoll',$data->id], 'method' =>'PATCH', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Due collection</div>
                            <div class="panel-body">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="form-group">
                                    <label class="col-sm-2">Invoice No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="InvNo" id="txtInvNo" value="{{$data->InvoiceNo}}" />
                                        <input type="text" class="hidden" name="AccNo" id="txtAccNo" value="{{$data->AccNo}}" />
                                    </div>
                                    <label class="col-sm-2">Invoice Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control datepicker2 disabled" name="InvDate" id="txtInvDate" value="{{$data->InvoiceDate}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Due Amt</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="DueAmount" id="txtDueAmount" value="{{$data->Due}}" />
                                    </div>
                                    <label class="col-sm-2">Paid Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control datepicker disabled" name="PaidDate" id="txtPaidDate" value="{{$data->RefDate}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Patient Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="CustomerName" id="txtCustomerName" value="{{$data->Name}}" />
                                    </div>
                                    <label class="col-sm-2">Phone No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Phone" id="txtPhone" value="{{$data->MobileNo}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Email </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Email" id="txtEmail" value="{{$data->Email}}" />
                                    </div>
                                    <label class="col-sm-2">Address</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Address" id="txtAddress" value="{{$data->Address}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Receive</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="Receive" id="txtReceive" value="{{$data->Paid}}">
                                    </div>
                                    <label class="col-sm-2">Rest Due</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="RestDueAmount" id="txtRestDueAmt" value="{{$data->Due}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="txtRemarks" name="Remarks" value="{{$data->remarks}}">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <a class="btn btn-success" id="saveInfo" onclick="save()"><i class="fa fa-floppy-o"></i><b>Update</b></a>
                                    <a href="{{url('milksaleduecoll')}}" class="btn btn-info">Due Collection List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            {!! Form::close() !!}
        </section>
    </div>
    </section>
</div>
</div>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#validate').validate({
            rules: {
                InvNo: "required",
                Receive: "required",

            },
            messages: {
                InvNo: "Please enter invoice number",
                Receive: "Please check collection amount",
            },
        });
    });
    $('#txtReceive').keyup(function() {
        var val1 = parseFloat($(this).val());
        var val2 = parseFloat($("#txtDueAmount").val());

        if (val1 > val2) {
            $('#txtReceive').val('');
        }
        var lnResult = val2 - val1;
        $("#txtRestDueAmt").val(lnResult);
    });
    $('#txtReceive').keypress(function(e) {
        if (e.keyCode == 13 && ($('#txtReceive').val() != "")) {
            $("#txtRemarks").focus();
        }
    });
    $('#txtRemarks').keypress(function(e) {
        if (e.keyCode == 13 && ($('#txtReceive').val() != "")) {
            $("#txtRemarks").val('N/A');
            $("#saveInfo").focus();
        }
    });
    $(document).ready(function() {
        $('#txtInvNo').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: '/getmilksaleinvno',
                    dataType: "Json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'param': $("#txtInvNo").val()
                    },
                    success: function(data) {
                        console.log(data);
                        var resp = $.map(data, function(obj) {
                            return {
                                label: obj.InvoiceNo + ' - ' + obj.Name + ' - ' + obj.MobileNo + '- ' + obj.DueAmt,
                                InvoiceNo: obj.InvoiceNo,
                                InvoiceDate: obj.InvoiceDate,
                                DueAmt: obj.DueAmt,
                                MobileNo: obj.MobileNo,
                                Name: obj.Name,
                                AccNo: obj.AccNo,
                                Email: obj.Email,
                                Address: obj.Address,
                            };
                        });
                        response(resp.slice(0, 10));
                    }
                });
            },
            autoFocus: true,
            select: function(event, ui) {
                $("#txtInvNo").val(ui.item.InvoiceNo);
                $("#txtInvDate").val(ui.item.InvoiceDate);
                $("#txtDueAmount").val(ui.item.DueAmt);
                $("#txtRestDueAmt").val(ui.item.DueAmt);
                $("#txtCustomerName").val(ui.item.Name);
                $("#txtPhone").val(ui.item.MobileNo);
                $("#txtAccNo").val(ui.item.AccNo);
                $("#txtEmail").val(ui.item.Email);
                $("#txtAddress").val(ui.item.Address);
                return false;
            },
            minLength: 2
        });
    });

    function save() {
        var r = confirm("Are You Sure !");
        if (r == true) {
            $('.formsave').submit();
        }
    }
</script>
@endsection