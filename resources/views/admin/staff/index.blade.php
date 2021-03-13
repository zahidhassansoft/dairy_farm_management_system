@extends('admin.master.layout')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-users"></i> Staff List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Staff List</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-body">
                    <div class="table_scroll">
                        @if(session('message'))
                        <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                        @endif
                        <div class="table-responsive">
                            <table id="datatable" class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Designation</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $rows)
                                    <tr>
                                        <td class="col-sm-1"><img width="100%" height="50px" src="{{ URL::asset($rows->image) }}"></td>
                                        <td>{{$rows->name}}</td>
                                        <td>{{$rows->email}}</td>
                                        <td>{{$rows->phone_number}}</td>
                                        <td>{{$rows->designation}}</td>
                                        <td>{{$rows->joining_date}}</td>
                                        <td>{{$rows->salary}}</td>
                                        <td>{{$rows->status}}</td>
                                        <td>
                                            <a href="{{url('staff/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE','url' => ['staff', $rows->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-header with-border" align="right"> <a href="{{url('staff/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add Employee</b> </a> </div>
                    </div>
                </div>
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

    $('.delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });

    function editData($id) {
        console.log($id);
    };
</script>
@endsection