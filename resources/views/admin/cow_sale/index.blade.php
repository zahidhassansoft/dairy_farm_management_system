@extends('admin.master.layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-list"></i> Cow Sale List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cow Sale List</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-responsive" id="datatable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Address</th>
                                    <th>Total Price</th>
                                    <th>Total Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $rows)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$rows->invoice_no}}</td>
                                    <td>{{ date('Y-m-d',strtotime($rows->date))}}</td>
                                    <td>{{$rows->customer_name}}</td>
                                    <td>{{$rows->customer_phone}}</td>
                                    <td>{{$rows->address}}</td>
                                    <td>{{$rows->sale_price}}</td>
                                    <td>{{$rows->paid_amount}}</td>
                                    <td>{{$rows->due_amount}}</td>
                                    <td>
                                        <a href="{{url('cowsale/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE','url' => ['cowsale', $rows->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box-header with-border" align="right"> <a href="{{url('cowsale/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>New Sale</b> </a></div>
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

    function editData($id) {
        console.log($id);
    };
</script>
@endsection