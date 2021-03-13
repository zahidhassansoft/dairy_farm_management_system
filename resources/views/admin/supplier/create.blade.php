@extends('admin.master.layout')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->

    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-user" aria-hidden="true"></i> Supplier Profile Information</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Supplier Profile Information</li>
            </ol>
        </section>
        <section class="content">
            @if(session('message'))
            <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
            @endif
            <!-- Default box -->
            <div class="box box-success">
                {!! Form::open(['url' => 'supplier', 'method' =>'post', 'id'=>'validate', 'class'=>'formsave','enctype'=>"multipart/form-data"]) !!}
                @csrf
                <!-- <form method="POST" action="{{url('storestaff')}}" enctype="multipart/form-data"> -->
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile Information:</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="supplier_name">Supplier Name : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="supplier_name" id="supplier_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="company_name">Company Name : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="company_name" class="form-control" id="company_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="phone_number">Phone Number : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="email">Email :<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="address">Address :</label>
                                    <div class="col-md-8">
                                        <textarea name="address" class="form-control" id="address" cols="30" rows="9"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <b>Save</b></button>
                            &nbsp;
                            <a href="{{url('supplier')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> List</b></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading feed-heading"> <i class="fa fa-image"></i> Supplier Images</div>
                            <div class="panel-body" id="imageBlock">
                                <div class="staffimagebox">
                                    <div class="select_image"> <img src="{{url('frontend/images/staff.png')}}" id="image" style="width: 245px; height:280px;"> </div>
                                    <label class="btn btn-success btnImgUp"> Browse
                                        <input type="file" name="image" class="form-control" id="image-select">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
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
</script>
@endsection