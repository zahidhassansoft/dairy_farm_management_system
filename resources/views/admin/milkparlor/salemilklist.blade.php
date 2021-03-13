@extends('admin.master.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-list" aria-hidden="true"></i> Sale Milk List</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sale Milk List</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-body">
        <div class="table-responsive">
          <table id="datatable" class="table no-margin">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Invoice</th>
                <th>Date</th>
                <!-- <th>Account No</th> -->
                <th>Name</th>
                <th>Contact</th>
                <!-- <th>Email</th> -->
                <th>Litre</th>
                <th>Price</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key => $rows)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$rows->InvoiceNo}}</td>
                <td>{{$rows->InvoiceDate}}</td>
                <!-- <td>{{$rows->AccNo}}</td> -->
                <td>{{$rows->Name}}</td>
                <td>{{$rows->MobileNo}}</td>
                <!-- <td>{{$rows->Email}}</td> -->
                <td>{{$rows->Litre}}</td>
                <td>{{$rows->PriceLitre}}</td>
                <td>{{ number_format($rows->Total)}}</td>
                <td>{{ number_format($rows->Paid)}}</td>
                <td>{{ number_format($rows->Due) }}</td>
                <td>
                  <a href="{{url('salemilk/view/'.$rows->InvoiceNo)}}" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                  <a href="{{url('salemilk/'.$rows->id.'/edit')}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                  {!! Form::open(['method' => 'DELETE','url' => ['salemilk', $rows->InvoiceNo],'style'=>'display:inline']) !!}
                  {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm delete'] )  }}
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="box-header with-border" align="right"> <a href="{{url('salemilk')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> <b>New Sale</b> </a> </div>
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