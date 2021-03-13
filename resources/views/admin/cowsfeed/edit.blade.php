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
                {!! Form::open(['url' => ['/storefeed',$data->id], 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
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
                                                    <option value="{{$row->id}}" {{ (($data->stall_no) && $data->stall_no == $row->id) ? "selected" : "" }}>{{$row->stall_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cowid">Cow Number <span class="validate">*</span> : </label>
                                                <select class="form-control" name="cowid" id="cowid" required>
                                                    <option value="">{{$data->cow_no}}</option>
                                                    <!-- <option value="">---Select---</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Date <span class="validate">*</span> : </label>
                                                <input type="text" name="date" class="form-control datepicker" autocomplete="off" value="{{$data->date}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note">Note : </label>
                                                <textarea name="note" class="form-control">{{$data->note}}</textarea>
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
                                                <tr>
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
                                                    <td><a class="btn btn-info" id="add" name="add" onclick="fncAdd()"><i class="fa fa-plus-square" aria-hidden="true"></i> </a></td>
                                                </tr>
                                            </thead>
                                            <tbody id="feedinformations">
                                                @if($data->cows_feed->count() > 0)
                                                @foreach($data->cows_feed as $feed)
                                                <tr>
                                                    <td><input class='form-control' name='item[]' type='text' value='{{$feed->food_item}}' readonly /></td>
                                                    <td><input class='form-control' name='quantity[]' type='text' value='{{$feed->item_quantity}}' readonly /> </td>
                                                    <td><input class='form-control' name='unit[]' type='text' value='{{$feed->unit}}' readonly /> </td>
                                                    <td><input class='form-control' name='feedingtime[]' type='text' value='{{$feed->feedingTime}}' readonly /> </td>
                                                    <td><a class="btn btn-danger removeRow" style="color:white"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success " id="saveInfo"><i class="fa fa-floppy-o"></i> <b>Update</b></button>
                            &nbsp;
                            <a href="{{url('cowsfeed')}}" class="btn btn-primary "><i class="fa fa-list"></i> <b> List</b></a>
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
    $(document).ready(function() {
        $('#stallno').change(function() {
            var cowfeedid = $(this).val();
            $.ajax({
                url: "http://127.0.0.1:8000/cowsfeed/getmanimalid/" + cowfeedid,
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
    $('#validate').validate({
        rules: {
            feedingtime: {
                maxlength: 5,
                max: 23.59,
                min: 0.00,
            },
        },
        messages: {
            feedingtime: "Please check feeding time"
        },
    });

    function fncAdd() {
        var item = $('#item').val();
        var quantity = $('#quantity').val();
        var unit = $('#unit').val();
        var feedingtime = $('#feedingtime').val();
        if ($('#quantity').val() == "") {
            alert('Pleas enter quantity');
            return false;
        } else if ($('#feedingtime').val() == "") {
            alert('Please enter feeding time')
            return false;
        }
        var row = '<tr> ' +
            "<td><input class='form-control' name='item[]' type='text' value='" + item + "' readonly/></td>" +
            "<td><input class='form-control' name='quantity[]' type='text' value='" + quantity + "' readonly/> </td> " +
            "<td><input class='form-control' name='unit[]' type='text' value='" + unit + "' readonly/> </td> " +
            "<td><input class='form-control' name='feedingtime[]' type='text' value='" + feedingtime + "' readonly/> </td> " +
            '<td><a class="btn btn-danger removeRow" style="color:white"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>' +
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