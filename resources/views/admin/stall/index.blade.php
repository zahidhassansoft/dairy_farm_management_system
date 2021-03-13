@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-home" aria-hidden="true"></i> Stall List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Stall List</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('stallcreate')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
            <div class="box-body">
                <div class="table_scroll">
                    @if(session('message'))
                    <div class="alert alert-success" id="message">{{session('message')}}</div>
                    @endif
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Stall No</th>
                                <th>Status</th>
                                <th>Max Availity</th>
                                <th>Available</th>
                                <th>Detials</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $rows)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$rows->stall_no}}</td>
                                @if($rows->stall >= $rows->max_availity)
                                <td><label class="label label-danger lblfarm">Booked</label></td>
                                @else
                                <td><label class="label label-success lblfarm">Available</label></td>
                                @endif
                                <td>{{$rows->max_availity}}</td>
                                <td>{{$rows->max_availity - $rows->stall}}</td>
                                <td>{{$rows->details}}</td>
                                <td>
                                    <a href="{{url('stall/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','url' => ['stall/delete', $rows->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div align="center"></div>
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