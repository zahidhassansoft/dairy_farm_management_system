@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-university" aria-hidden="true"></i> Stall</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Stall</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => ['/stall/update',$data->id], 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-sm-6 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-plus-square" style="color: green"></i> Add New Stall</div>
                            <div class="panel-body">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="stall_no">Stall Number :<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="stall_no" id="stall_no" class="form-control" value="{{$data->stall_no}}" readonly>
                                        <!-- @if($errors->has('stall_no'))<p class="text-danger">{{ $errors->first('stall_no') }}</p> @endif -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="details">Details : </label>
                                    <div class="col-md-8">
                                        <textarea name="details" id="details" class="form-control" value="">{{$data->details}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success " id="saveInfo"><i class="fa fa-bitbucket" aria-hidden="true"></i><b>Update</b></button>
                             <a href="{{url('stall')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> List</b></a>
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
            stall_no: {
                required: true,
            },
        },
        messages: {
            stall_no: {
                required: "Please enter stall no",
            },
        },
    });
</script>
@endsection