@extends('admin.master.layout')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart"></i> Sale Cow Due Collection List</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sale Cow Due Collection List</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-body">
                    <div class="table_scroll">
                        @if(session('message'))
                        <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Referance No</th>
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Paid</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $rows)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$rows->RefNo}}</td>
                                        <td>{{$rows->invoice_no}}</td>
                                        <td>{{ date('Y-m-d',strtotime($rows->date))}}</td>
                                        <td>{{$rows->customer_name}}</td>
                                        <td>{{$rows->customer_phone}}</td>
                                        <td>{{$rows->paid_amount}}</td>
                                        <td>
                                            <a href="{{url('cowsaleduecoll/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE','url' => ['cowsaleduecoll', $rows->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-header with-border" align="right"> <a href="{{url('cowsaleduecoll/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>New Collection</b> </a></div>
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