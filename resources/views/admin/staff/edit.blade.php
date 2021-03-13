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
            <h1><i class="fa fa-user-circle"></i> Edit Profile Information</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Profile Information</li>
            </ol>
        </section>
        <section class="content">

            <!-- Default box -->
            <div class="box box-success">
                {!! Form::open(['url' => ['/staff',$data->id], 'method' =>'PATCH', 'id'=>'validate', 'class'=>'formsave','enctype'=>"multipart/form-data"]) !!}
                @csrf
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-user-circle"></i>&nbsp;Profile Information:</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="name">Full Name : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                        <input type="hidden" name="emoloyee_id" class="form-control" value="{{$data->employeeId}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="email">Email Address : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" id="email" value="{{$data->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="phone_number">Phone Number : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{$data->phone_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="nid">NID :<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="nid" class="form-control" id="nid" value="{{$data->nid}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Gender :<span class="validate isnumber">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">---Select---</option>
                                            <option value="Male" {{ $data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="designation">Designation :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="designation">
                                            <option value="0">-- Select --</option>
                                            @foreach($designation as $row)
                                            <option value="{{$row->name}}" {{ (isset($data->designation)&& $data->designation == $row->name) ? "selected" : ""}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="user_type">User Type :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="user_type">
                                            <option value="0">-- Select --</option>
                                            @foreach($usertype as $row)
                                            <option value="{{$row->name}}" {{ (isset($data->user_type)&& $data->user_type == $row->name) ? "selected" : ""}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="present_address">Present Address :</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="present_address" id="present_address">{{$data->present_address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="parmanent_address">Parmanent Address :</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="parmanent_address" id="parmanent_address">{{$data->parmanent_address}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="salary">Salary : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter Salary" value="{{$data->salary}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="joining_date">Joining Date : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="joining_date" class="form-control wsit_datepicker" id="joining_date" value="{{date('Y-m-d',strtotime($data->joining_date))}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-user-circle"></i>&nbsp;Profile Image:</div>
                            <div class="panel-body">
                                <div class="staffimagebox">
                                    <div class="select_image"> <img src="{{ URL::asset($data->image) }}" id="image"> </div>
                                    <label class="btn btn-success btnImgUp"> Browse
                                        <input type="file" name="image" class="form-control" id="image-select">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" id="saveInfo"><i class="fa fa-floppy-o"></i> <b>Update</b></button>
                            &nbsp;
                            <a href="{{url('staff')}}" class="btn btn-warning "><i class="fa fa-list" aria-hidden="true"></i> <b> List</b></a>
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
        $('#validate').validate({
            rules: {
                name: "required",
                email: "required",
                phone_number: "required",
                salary: "required",
                joining_date: "required",
                nid: "required",
            },
            messages: {
                name: "Please enter name",
                email: "Please enter email",
                phone_number: "Please enter phone number",
                salary: "Please enter salary",
                joining_date: "Please enter joining date",
                nid: "Please enter NID no",
            },
        });
    });
</script>
@endsection