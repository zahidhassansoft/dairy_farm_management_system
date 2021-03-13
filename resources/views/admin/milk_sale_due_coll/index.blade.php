@extends('admin.master.layout')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart"></i> Sale Milk Due Collection List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sale Milk Due Collection List</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            @if (Session::has('message'))
                            <div class="text-center alert-danger">{{ Session::get('message') }}</div>
                            @endif

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="datatable" class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Account No</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Paid</th>
                                            <th class="col-sm-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $index => $row)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{{ $row->AccNo }}</td>
                                            <td>{{ $row->RefDate }}</td>
                                            <td>{{ $row->Name }}</td>
                                            <td>{{ $row->MobileNo }}</td>
                                            <td>{{ $row->Paid }}</td>
                                            <td class="align-middle">
                                                <a href="{{url('milksaleduecoll/'.$row->id.'/edit')}}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE','url' => ['milksaleduecoll', $row->id],'style'=>'display:inline']) !!}
                                                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs delete'] )  }}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{url('milksaleduecoll/create')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i>Add New</a>
                        </div>
                    </div>
                </div>
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

    function editData($id) {
        console.log($id);
    };
</script>
@endsection