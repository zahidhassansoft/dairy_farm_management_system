@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-tasks" aria-hidden="true"></i> Expense List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Expense List</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('expense/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
            <div class="box-body">
                <div class="table_scroll">
                    @if(session('message'))
                    <div class="alert alert-success" id="message">{{session('message')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-responsive">
                        <!-- <table class="table table-bordered table-striped table-responsive" id="datatable"> -->
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Date</th>
                                    <th>Purpose Name</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <!-- <th></th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $ttl = 0;
                            @endphp
                                @foreach($data as $key => $rows)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$rows->date}}</td>
                                    <td>{{$rows->name}}</td>
                                    <td>{{$rows->details}}</td>
                                    <td class="text-right"><b>{{number_format($rows->total_amount,2)}}</b></td>
                                    <td>
                                        <a href="{{url('expense/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE','url' => ['expense', $rows->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                        {!! Form::close() !!}
                                    </td>
                                @php
                                $ttl += $rows->total_amount;
                                @endphp
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td class="text-right" colspan="4"><b>Total</b></td>
                                    <td class="text-right"><b>{{number_format($ttl,2)}}</b></td>
                                </tr> -->
                            </tbody>
                        </table>
                        {!! $data->render(); !!}
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
</script>
@endsection