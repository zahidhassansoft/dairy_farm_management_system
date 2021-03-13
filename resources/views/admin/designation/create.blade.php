@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-steam-square" aria-hidden="true"></i> Add New Designation</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">New Designation</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => '/designation', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-sm-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-plus-square" style="color: green"></i> Add New Designation</div>
                            <div class="panel-body">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="name">Name :<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                                        @if($errors->has('name'))<p class="text-danger">{{ $errors->first('name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Description :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="details" id="details" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success" id="saveInfo"><i class="fa fa-floppy-o"></i><b>Save</b></button>
                            <!-- &nbsp; -->
                            <a href="{{url('designation')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> list</b></a>
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