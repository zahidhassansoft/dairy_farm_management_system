@extends('welcome')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-tv" aria-hidden="true"></i> Cow Monitor</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cow Monitor</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => '/managecowpregnancy', 'method' =>'POST', 'id'=>'validate','class'=>'formsave','enctype'=>"multipart/form-data"]) !!}
                @csrf
                <div class="box-body">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            @if(session('message'))
                            <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                            @endif
                            <div class="panel-heading feed-heading"><i class="fa fa-info-circle"></i>&nbsp;Basic Information :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shed_no">Stall No <span class="validate">*</span> : </label>
                                                <select class="form-control loadCow" name="stall_no" id="stall_no" required>
                                                    <option value="">-- Select --</option>
                                                    @foreach($stall as $row)
                                                    <option value="{{$row->id}}">{{$row->stall_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cow_id">Animal ID <span class="validate">*</span> : </label>
                                                <select class="form-control animal-details-by-stall-no" name="animalId" id="animalId" required>
                                                    <option value="">-- Select --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading"><i class="fa fa-list"></i>&nbsp;Animal Pregnancy Details : :</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="weight">Pregnancy Type <span class="validate">*</span> : </label>
                                            <select name="pregnancy_type" id="pregnancy_type" class="form-control">
                                                <option value="0">---Select---</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="By Collected Semen">By Collected Semen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="height">Semen Type : <span class="validate">*</span> : </label>
                                            <select name="semen_type" id="semen_type" class="form-control">
                                                <option value="">---Select---</option>
                                                @foreach($sementype as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="milk">Semen Push Date : </label>
                                            <input type="text" name="semen_push_date" id="semen_push_date" class="form-control wsit_datepicker" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Pregnancy Start Date <span class="validate">*</span> : </label>
                                            <input id="pregnancy_start_date" type="text" name="pregnancy_start_date" class="form-control wsit_datepicker psd" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Semen Cost : </label>
                                            <input id="semen_cost" type="text" name="semen_cost" class="form-control decimal" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Others Cost <span class="validate">*</span> : </label>
                                            <input id="others_cost" type="text" name="others_cost" class="form-control decimal" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="note">Note : </label>
                                            <input id="note" type="text" name="note" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="note">Approximate Delivery Date </label>
                                            <input id="delivery_date" type="text" name="delivery_date" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" id="saveInfo"><i class="fa fa-floppy-o"></i><b>Save</b></button>
                                        <!-- &nbsp; -->
                                        <a href="{{url('routinemonitor')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> List</b></a>
                                    </div>
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
        $('#stall_no').change(function() {
            var animal_id = $("#stall_no").val();
            $.ajax({
                url: "loadaimalidmcp/" + animal_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);
                    var obj = JSON.parse(JSON.stringify(data));
                    $('#animalId').html('<option value="">---Select---</option>');
                    obj.forEach(function(animal) {
                        // var id = animal.id;
                        var value = animal.animal_id;
                        $('#animalId').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
        });

    });

    var end = $('#pregnancy_start_date').val();

    $('#semen_cost').on('click', function() {
        console.log(end);
    });

    
    $('#validate').validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter food unit name",
            },
        },
    });
</script>
@endsection