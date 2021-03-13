@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-info-circle"></i>Cow sale information</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cows sale information</li>
            </ol>
        </section>
        @if(session('message'))
        <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
        @endif
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => '/cowsale', 'method' =>'post', 'id'=>'validate','class'=>'formsave','enctype'=>"multipart/form-data"]) !!}
                @csrf
                <div class="box-body">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Customer Information :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date <span class="validate">*</span> : </label>
                                                <input type="text" name="date" id="date" class="form-control datepicker" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer Name <span class="validate">*</span> : </label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number <span class="validate">*</span> : </label>
                                                <input type="text" name="customer_phone" id="customer_phone" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer Email : </label>
                                                <input type="text" name="customer_email" id="customer_email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer Address : </label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Note <span class="validate"></span> : </label>
                                                <input type="text" name="note" id="note" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Cow Selection</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table grid-table">
                                            <thead id="table" name="table">
                                                <tr style="margin-bottom: -10px;">
                                                    <th>Image</td>
                                                    <th>Animal Type</th>
                                                    <th>Animal Id</th>
                                                    <th>Stall No</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{url('frontend/images/noImage.jpg')}}" id="image" name="image" class="img-thumbnail img-width-150">
                                                    </td>
                                                    <td class="verticalAlign">
                                                        <select class="form-control" id="cowtype" name="cowtype">
                                                            <option value="">-- Select --</option>
                                                            <option value="1">Cow</option>
                                                            <option value="2">Calf</option>
                                                        </select>
                                                    </td>
                                                    <td class="verticalAlign">
                                                        <select class="form-control" id="animal_id" name="animal_id">
                                                            <option value="">-- Select --</option>
                                                        </select>
                                                    </td>
                                                    <td class="verticalAlign">
                                                        <input type="text" id="stall_no" name="stall_no" class="form-control" value="" readonly>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Payment Information :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price <span class="validate">*</span> : </label>
                                                <input type="text" name="total_price" class="form-control isnumber" id="total_price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="total_paid">Paid <span class="validate">*</span> : </label>
                                                <input type="text" name="total_paid" class="form-control isnumber" id="total_paid" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="due">Due Amount : </label>
                                                <input type="text" name="due_amount" class="form-control" id="due_amount" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success save" id="saveInfo"><i class="fa fa-floppy-o"></i> <b>Save Information</b></button>
                            &nbsp;
                            <a href="{{url('cowsale')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> List</b></a>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                {!! Form::close() !!}
                <div class="box-footer"> </div>
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
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-1y',
        endDate: '0d',
        autoclose: true,
    });
    $('.save').click(function(e) {
        var totalPrice = $('#total_paid').val();
        var totalPaid = $('#total_price').val();
        var due = totalPaid - totalPrice;
        if (due < 0) {
            alert('You can not give more then price amount');
            return false;
        }
    });
    $(document).ready(function() {
        $('#validate').validate({
            rules: {
                name: "required",
                email: "required",
                phone_number: "required",
                salary: "required",
                joining_date: "required",
            },
            messages: {
                name: "Please enter name",
                email: "Please enter email",
                phone_number: "Please enter phone number",
                salary: "Please enter salary",
                joining_date: "Please enter joining date",
            },
        });
    });

    $(document).ready(function() {
        $('#cowtype').change(function() {
            var id = $('#cowtype').val();
            if (id == 1) {
                $.ajax({
                    url: "getanimalidforcow/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data);
                        var obj = JSON.parse(JSON.stringify(data));
                        $('#animal_id').html('<option value="">---Select---</option>');
                        obj.forEach(function(animal) {
                            var id = animal.id;
                            var value = animal.animal_id;
                            $('#animal_id').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else if (id == 2) {
                $.ajax({
                    url: "getanimalidforcalf/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data);
                        var obj = JSON.parse(JSON.stringify(data));
                        $('#animal_id').html('<option value="">---Select---</option>');
                        obj.forEach(function(animal) {
                            var id = animal.id;
                            var value = animal.animal_id;
                            $('#animal_id').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            }
        });
        $('#animal_id').change(function() {
            var id = $('#animal_id').val();
            $.ajax({
                url: "getstallimage/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    var obj = JSON.parse(JSON.stringify(data));
                    obj.forEach(function(data) {
                        $('#stall_no').val(data.stall_no);
                        $('#image').val(data.images);
                    });
                }
            });
        });
        $('#total_paid').on('change', function() {
            var totalPrice = $(this).val();
            var totalPaid = $('#total_price').val();
            var due = totalPaid - totalPrice;
            $('#due_amount').val(due);

        });
    });
</script>
@endsection