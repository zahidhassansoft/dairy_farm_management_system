@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-tasks" aria-hidden="true"></i> Animal Types</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Animal Types</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border" align="right"> <a href="{{url('animaltype/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>Add New</b> </a> <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-refresh"></i> <b>Refresh</b> </a> </div>
            <div class="box-body">
                <div class="col-sm-8 col-md-offset-3">
                    <div class="table_scroll">
                        @if(session('message'))
                        <div class="alert alert-success" id="message">{{session('message')}}</div>
                        @endif
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Type Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $rows)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><label class="label label-success">{{$rows->name}}</label></td>
                                    <td>
                                        <a href="{{url('animaltype/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE','url' => ['animaltype', $rows->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger delete btn-sm'] )  }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
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
<!-- 
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus-square color-green"></i> Add new color</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{!! Form::open(['url' => '/colorstore', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="name">
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</a>
                    <button type="submit" id="insertbtn" class="btn btn-sm btn-success">Save</button>
                </div>
                {{ csrf_field() }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div> -->

@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addForm() {
        save_method = 'add';
        $('input[name_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add new color');
        // $('#insertbtn').text('Save');
        // $('h4').append('<i class="fa fa-plus-square color-green"></i>');
    }
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
                required: "Please enter stall no",
            },
        },
    });
</script>
@endsection