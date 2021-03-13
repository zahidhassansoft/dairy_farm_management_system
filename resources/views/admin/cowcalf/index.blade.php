@extends('admin.master.layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-tasks" aria-hidden="true"></i> Cow Calf List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cow Calf List</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-header with-border" align="right"> <a href="{{url('cowcalf/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
                @if(session('message'))
                <div class="alert alert-danger" id="message" style="display:block;color:green">{{session('message')}}</div>
                @endif
                <div class="box-body">
                    <div class="table_scroll">
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Cow Calf Id</th>
                                    <th>Image</th>
                                    <th>Mohter Id</th>
                                    <th>Stall No</th>
                                    <th>Gender</th>
                                    <th>Animal Type</th>
                                    <th>Buy Date</th>
                                    <th>Buying Price</th>
                                    <!-- <th>Calf Status</th> -->
                                    <th>User Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $rows)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$rows->animal_id}}</td>
                                    <td class="text-center col-sm-1"><img name="zoom" style="background-color: red;padding:1px" width="100%" height="40px" src="{{ URL::asset($rows->image) }}"></td>
                                    @if($rows->mother_id != "")
                                    <td>{{$rows->mother_id}}</td>
                                    @else
                                    <td>Buy</td>
                                    @endif
                                    <td>{{$rows->stall_no}}</td>
                                    <td>{{$rows->gender}}</td>
                                    <td>{{$rows->animal_type}}</td>
                                    <td>{{ date('Y-m-d',strtotime($rows->buy_date)) }}</td>
                                    <td>{{$rows->buy_price}}</td>
                                    <!-- <td>{{$rows->Status}}</td> -->
                                    <td>{{$rows->user_name}}</td>
                                    <td>
                                        <a href="{{url('cowcalf/edit/'.$rows->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('cowcalf/delete/'.$rows->animal_id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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