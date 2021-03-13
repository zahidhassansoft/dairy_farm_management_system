@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-list" aria-hidden="true"></i> Cow Feed Details</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cows Feed Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('cowsfeedcreate')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>AddNew</b> </a> <a href="{{url('cowsfeed')}}" class="btn btn-primary btn-sm"> <i class="fa fa-list"></i> <b>List</b> </a> </div>
            <div class="box-body">
                <div class="col-sm-8 col-sm-offset-2">
                    <h4 class="text-center">Stall No : {{$data->stall->stall_no}}</h4>
                    <h4 class="text-center">Cows Id : {{$data->cow_no}}</h4>
                    <p class="text-center">Feeding Date : {{ (date('Y-m-d',strtotime( $data->date)))}}</p>
                    <hr>
                    <div class="table_scroll">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Fedding Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->cows_feed->count() > 0)
                                @foreach($data->cows_feed as $feed)
                                <tr>
                                    <td class="text-center"><label>{{$feed->food_item}}</label></td>
                                    <td class="text-center"><label>{{$feed->item_quantity}}</label></td>
                                    <td class="text-center"><label>{{$feed->unit}}</label></td>
                                    <td class="text-center"><label>{{$feed->feedingTime}}</label></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div align="center"></div>
                    </div>
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
</script>
@endsection