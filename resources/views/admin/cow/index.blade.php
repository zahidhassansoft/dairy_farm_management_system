@extends('admin.master.layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-tasks" aria-hidden="true"></i> Cow List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cow List</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-header with-border" align="right"> <a href="{{route('cow/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
                @if(session('message'))
                <div class="alert alert-danger" id="message" style="display:block;color:green">{{session('message')}}</div>
                @endif
                <div class="box-body">
                    <div class="table_scroll">
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Cow Id</th>
                                    <th>Image</th>
                                    <th>Gender</th>
                                    <th>Animal Type</th>
                                    <th>Buy Date</th>
                                    <th>Buying Price</th>
                                    <th>Pregnent Status</th>
                                    <th>Milk Per Day (LTR)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $rows)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$rows->animal_id}}</td>
                                    <td class="text-center col-sm-1"><img name="zoom" style="background-color: red;padding:1px" width="100%" height="40px" src="{{ URL::asset($rows->image) }}"></td>
                                    <!-- <td>{{$rows->image}}</td> -->
                                    <td>{{$rows->gender}}</td>
                                    <td>{{$rows->animal_type}}</td>
                                    <td>{{$rows->buy_date}}</td>
                                    <td>{{$rows->buy_price}}</td>
                                    <td>{{$rows->pregnant_status}}</td>
                                    <td>{{$rows->milk_per_day_ltr}}</td>
                                    <td>
                                        <a href="{{url('cow/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('cow/delete/'.$rows->animal_id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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