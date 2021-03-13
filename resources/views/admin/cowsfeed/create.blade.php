@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-cutlery"></i> Cows Feed</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cows Feed</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => '/storefeed', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            @if(session('message'))
                            <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                            @endif
                            <div class="panel-heading feed-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Basic Information :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="stallno">Stall No <span class="validate">*</span> : </label>
                                                <select class="form-control loadCow" name="stallno" id="stallno" required>
                                                    <option value="">---Select---</option>
                                                    @foreach($stall as $row)
                                                    <option value="{{$row->id}}">{{$row->stall_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cowid">Cow Number <span class="validate">*</span> : </label>
                                                <select class="form-control" name="cowid" id="cowid" required>
                                                    <option value="">---Select---</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Date <span class="validate">*</span> : </label>
                                                <input type="text" name="date" class="form-control datepicker" autocomplete="off" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note">Note : </label>
                                                <textarea name="note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Feed Informations :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table grid-table">
                                            <thead id="table" name="table">
                                                <tr style="margin-bottom: -10px;">
                                                    <th>Item</td>
                                                    <th>Quantity</th>
                                                    <th>Unit</th>
                                                    <th>Feeding Time</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="item" id="item" class="form-control" style="width:200px">
                                                            <option value="grass">Grass</option>
                                                            <option value="salt">Salt</option>
                                                            <option value="water">Water</option>
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control isnumber" name="quantity" id="quantity" type="text" /> </td>
                                                    <td>
                                                        <select name="unit" id="unit" class="form-control" style="width:200px">
                                                            <option value="kg">Kilogram</option>
                                                            <option value="gm">Gram</option>
                                                            <option value="ltr">Litre</option>
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control" name="feedingtime" id="feedingtime" type="text" /> </td>
                                                    <td><input class="btn btn-success btn-block" id="add" name="add" type="button" value="Add" onclick="fncAdd()" /> </td>
                                                </tr>
                                            </thead>
                                            <tbody id="feedinformations"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success " id="saveInfo"><i class="fa fa-floppy-o"></i> <b>Save Information</b></button>
                            &nbsp;
                            <a href="{{url('cowsfeed')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> Feed List</b></a>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                {!! Form::close() !!}
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
        dateFormat: 'yyyy-mm-dd',
        startDate: '-1y',
        endDate: '0d',
        autoclose: true,
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
    $(document).ready(function() {
        $('#stallno').change(function() {
            var cowfeedid = $(this).val();
            $.ajax({
                url: "getmanimalid/" + cowfeedid,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);
                    var obj = JSON.parse(JSON.stringify(data));
                    $('#cowid').html('<option value="">---Select---</option>');
                    obj.forEach(function(animal) {
                        // var id = animal.id;
                        var value = animal.animal_id;
                        $('#cowid').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
        });
    });

    function fncAdd() {
        var item = $('#item').val();
        var quantity = $('#quantity').val();
        var unit = $('#unit').val();
        var feedingtime = $('#feedingtime').val();
        var row = '<tr> ' +
            "<td><input class='form-control' name='item[]' type='text' value='" + item + "' readonly/></td>" +
            "<td><input class='form-control' name='quantity[]' type='text' value='" + quantity + "' readonly/> </td> " +
            "<td><input class='form-control' name='unit[]' type='text' value='" + unit + "' readonly/> </td> " +
            "<td><input class='form-control' name='feedingtime[]' type='text' value='" + feedingtime + "' readonly/> </td> " +
            ' <td><a class="btn btn-info btn-block removeRow" style="color:white">Remove</a> </td>' +
            ' </tr>';
        $('.grid-table thead input').not(".grid-table thead #add").val('');
        $('#feedinformations').append(row);
    };

    $("table #feedinformations").on('click', 'a.removeRow', function(e) {
        $(this).closest('tr').remove();
        return false;
    });
</script>
@endsection