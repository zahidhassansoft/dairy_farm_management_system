@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cow Sale Due collection</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cow Sale Due collection</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => ['/cowsaleduecoll',$data->id], 'method' =>'PATCH', 'id'=>'validate','class'=>'formsave']) !!}
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
                                        <input type="text" class="form-control" name="InvNo" id="txtInvNo" value="{{$data->invoice_no}}" />
                                        <input type="text" class="hidden" name="AccNo" id="txtAccNo" />
                                    </div>
                                    <label class="col-sm-2">Invoice Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="InvDate" id="txtInvDate" value="{{$data->date}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Due Amt</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="DueAmount" id="txtDueAmount" value="{{$data->due_amount}}" />
                                    </div>
                                    <label class="col-sm-2">Paid Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control datepicker disabled" name="PaidDate" id="txtPaidDate" value="{{$data->RefDate}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Patient Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="CustomerName" id="txtCustomerName" value="{{$data->customer_name}}" />
                                    </div>
                                    <label class="col-sm-2">Phone No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Phone" id="txtPhone" value="{{$data->customer_phone}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Email </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Email" id="txtEmail" value="{{$data->customer_email}}" />
                                    </div>
                                    <label class="col-sm-2">Address</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="Address" id="txtAddress" value="{{$data->address}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Receive</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="Receive" id="txtReceive" value="{{$data->paid_amount}}">
                                    </div>
                                    <label class="col-sm-2">Rest Due</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control disabled" name="RestDueAmount" id="txtRestDueAmt" value="{{$data->due_amount}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="txtRemarks" name="Remarks" value="{{$data->note}}">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success save" id="saveInfo"><i class="fa fa-floppy-o"></i><b>Update</b></button>
                                    <a href="{{url('cowsaleduecoll')}}" class="btn btn-info">Invoice List</a>
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
    $('.save').click(function(e) {
        var totalPrice = $('#txtReceive').val();
        var totalPaid = $('#txtRestDueAmt').val();
        var due = totalPaid - totalPrice;
        if (due < 0) {
            alert('You can not give more then rest due');
            return false;
        }
    });
    $(document).ready(function() {
        $('#txtInvNo').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: '/getcowsaleinvno',
                    dataType: "Json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'param': $("#txtInvNo").val()
                    },
                    success: function(data) {
                        console.log(data);
                        var resp = $.map(data, function(obj) {
                            return {
                                label: obj.invoice_no + ' - ' + obj.customer_name + ' - ' + obj.customer_phone + '- ' + obj.DueAmt,
                                invoice_no: obj.invoice_no,
                                InvoiceDate: obj.InvoiceDate,
                                DueAmt: obj.DueAmt,
                                customer_phone: obj.customer_phone,
                                customer_name: obj.customer_name,
                                AccNo: obj.AccNo,
                                customer_email: obj.customer_email,
                                Address: obj.Address,
                            };
                        });
                        response(resp.slice(0, 10));
                    }
                });
            },
            autoFocus: true,
            select: function(event, ui) {
                $("#txtInvNo").val(ui.item.invoice_no);
                $("#txtInvDate").val(ui.item.InvoiceDate);
                $("#txtDueAmount").val(ui.item.DueAmt);
                $("#txtRestDueAmt").val(ui.item.DueAmt);
                $("#txtCustomerName").val(ui.item.customer_name);
                $("#txtPhone").val(ui.item.customer_phone);
                $("#txtAccNo").val(ui.item.AccNo);
                $("#txtEmail").val(ui.item.customer_email);
                $("#txtAddress").val(ui.item.Address);
                return false;
            },
            minLength: 2
        });
    });

    $("#txtReceive").on('keyup', function() {
        var val1 = parseFloat($("#txtReceive").val());
        var val2 = parseFloat($("#txtDueAmount").val());

        var lnResult = val2 - val1;
        $("#txtRestDueAmt").val(lnResult);
    });

    function save() {
        var valid = validation();
        if (valid == false) {
            return false;
        } else {
            $('.formsave').submit();
        }
    }
</script>
@endsection