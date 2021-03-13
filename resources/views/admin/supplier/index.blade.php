@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-tasks" aria-hidden="true"></i> Supplier List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Supplier List</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('supplier/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
            <div class="box-body">
                <div class="table_scroll">
                    @if(session('message'))
                    <div class="alert alert-success" id="message">{{session('message')}}</div>
                    @endif
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Supplier Name</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $rows)
                            <tr>
                                <td>{{$key+1}}</label></td>
                                <td class="text-center col-sm-1"><img name="zoom" style="background-color: red;padding:1px" width="100%" height="40px" src="{{ URL::asset($rows->image) }}"></td>
                                <td>{{$rows->supplier_name}}</td>
                                <!-- <td>{{$rows->image}}</td> -->
                                <td>{{$rows->company_name}}</td>
                                <td>{{$rows->phone_number}}</td>
                                <td>{{$rows->email}}</td>
                                <td>
                                    <a href="{{url('supplier/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','url' => ['supplier', $rows->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer"> </div>
        </div>
    </section>
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