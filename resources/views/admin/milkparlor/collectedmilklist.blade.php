@extends('admin.master.layout')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart"></i> Collected Milk List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Collected Milk List</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
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
                                            <th>sl</th>
                                            <th>Date</th>
                                            <th>Account No</th>
                                            <th>Stall No</th>
                                            <th>Animal Id</th>
                                            <th>Litre</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Collected From</th>
                                            <th class="col-sm-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $rows)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ date('Y-m-d',strtotime($rows->collected_date)) }}</td>
                                            <td>{{$rows->account_no}}</td>
                                            <td>{{$rows->stall_no}}</td>
                                            <td>{{$rows->animal_id}}</td>
                                            <td>{{$rows->liter}}</td>
                                            <td>{{$rows->price_liter}}</td>
                                            <td>{{$rows->total_price}}</td>
                                            <td>{{$rows->collected_from}}</td>
                                            <td>
                                                <a href="{{url('milkparlor/'.$rows->id.'/edit')}}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE','url' => ['milkparlor', $rows->account_no],'style'=>'display:inline']) !!}
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
                            <a href="{{url('milkparlor')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i>Add New</a>
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