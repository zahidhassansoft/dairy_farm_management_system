@extends('admin.master.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-user"></i> Employee Salary List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Employee Salary List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-success">
            <div class="box-body">
                @if(session('message'))
                <div class="alert alert-success" id="message">{{session('message')}}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive" id="datatable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Employee Name</th>
                                <th>Pay Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $rows)
                            <tr>
                                <td class="col-sm-1"><img width="100%" height="50px" src="{{ URL::asset($rows->image) }}"></td>
                                <td>{{$rows->employee_name}}</td>
                                <td>{{ date('Y-m-d',strtotime($rows->payment_date))}}</td>
                                <td>{{$rows->month}}</td>
                                <td>{{$rows->year}}</td>
                                <td>{{$rows->salary}}</td>
                                <td>
                                    <a href="{{url('employeesalary/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','url' => ['employeesalary', $rows->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-header with-border" align="right"> <a href="{{url('employeesalary/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"> </div>
            <!-- /.box-footer-->
        </div>
    </section>
    <!-- /.content -->
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
</script>
@endsection