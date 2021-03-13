@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-list" aria-hidden="true"></i> Cow Feed List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cows Feed List</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-body  col-sm-8 col-sm-offset-2">
                @if(session('message'))
                <div class="alert alert-success" id="message">{{session('message')}}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive" id="datatable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Stall No</th>
                                <th>Cow No</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $rows)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ date('Y-m-d',strtotime($rows->date)) }}</td>
                                <td>{{$rows->stall->stall_no}}</td>
                                <td>{{$rows->cow_no}}</td>
                                <td>{{$rows->note}}
                                <td>
                                    <a href="{{url('cowsfeed/view/'.$rows->id)}}" class="btn btn-default btn-sm"><i class="fa fa-film"></i></a>
                                    <a href="{{url('cowsfeed/'.$rows->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','url' => ['cowsfeed', $rows->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-header with-border" align="right"> <a href="{{url('cowsfeedcreate')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>AddNew</b> </a> </div>
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