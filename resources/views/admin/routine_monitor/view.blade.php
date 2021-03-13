@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-list" aria-hidden="true"></i> Cow Monitor News</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cows Feed LisCow Monitor Newst</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('routinemonitor/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>AddNew</b> </a> <a href="{{url('routinemonitor')}}" class="btn btn-primary btn-sm"> <i class="fa fa-list"></i> <b>List</b> </a> </div>
            <div class="box-body">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h4 class="text-center">Cows Id : {{$data->animal_id}}</h4>
                        <h4 class="text-center">Stall No : {{$data->getStall->stall_no}}</h4>
                        <p class="text-center">Feeding Date : {{ (date('Y-m-d',strtotime( $data->monitoring_date)))}}</p>
                    </div>
                    <hr>
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="table_scroll">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Service Name</th>
                                        <th class="text-center">Result</th>
                                        <th class="text-center">Monitoring Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data->routine_monitor->count() > 0)
                                    @foreach($data->routine_monitor as $rm)
                                    <tr>
                                        <td class="text-center"><label>{{$rm->service_name}}</label></td>
                                        <td class="text-center"><label>{{$rm->result}}</label></td>
                                        <td class="text-center"><label>{{$rm->time}}</label></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div align="center"></div>
                        </div>
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