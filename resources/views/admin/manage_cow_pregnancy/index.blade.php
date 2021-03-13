@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-list" aria-hidden="true"></i> Cow Pregnancy List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cow Pregnancy List</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="table_scroll">
                        @if(session('message'))
                        <div class="alert alert-success" id="message">{{session('message')}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Stall No</th>
                                        <th>Animal Id</th>
                                        <th>Pregnancy Date</th>
                                        <th>Semen Type</th>
                                        <th>Approximate Delivery Date</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $rows)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <!-- <td><label class="label label-success lblfarm">Availble</label></td> -->
                                        <td>{{$rows->stall_no}}</td>
                                        <td>{{$rows->animal_id}}</td>
                                        <td>{{$rows->pregnancy_start_date}}</td>
                                        <td>{{$rows->semen_type}}</td>
                                        <td>{{ date('Y-d-m',strtotime($rows->approximate_dalivery_date))}}</td>
                                        <td>{{$rows->note}}</td>
                                        <td>
                                            <a href="{{url('managecowpregnancy/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE','url' => ['managecowpregnancy', $rows->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-header with-border" align="right"> <a href="{{url('managecowpregnancy/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> </div>
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
    $('.delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });

    $('#validate').validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter food unit",
            },
        },
    });
</script>
@endsection