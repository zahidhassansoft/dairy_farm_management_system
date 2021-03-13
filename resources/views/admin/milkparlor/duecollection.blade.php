@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-money"></i> Milk Sale Due Pay</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Milk Sale Due Pay</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                <div class="box-body">
                    <div class="form-group">
                        <!-- {!! Form::open(['url' => '/getduecollectiondata', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                        @csrf -->
                        <div class="col-md-8">
                            <div class="panel panel-default col-md-offset-2 mt20">
                                <div class="panel-heading"><i class="fa fa-info-circle"></i> Invoice Number</div>
                                <div class="panel-body pb250">
                                    <div class="col-md-8">
                                        <input type="text" name="invoice_id" id="invoice_id" class="form-control" placeholder="Enter Invoice Number">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success btn100" onclick="getDueCollection()"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- {{ csrf_field() }}
                {!! Form::close() !!} -->
            </div>
        </section>
        <table class="table table-striped table-bordered" id="table-example">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Date</th>
                    <th>Invoice Number</th>
                    <th>Paid Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="dueInfo">

            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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

    function getDueCollection() {
        var invno = $('#invoice_id').val();
        $.ajax({
            type: "get",
            url: "getduecollectiondata/" + invno,
            dataType: "Json",
            success: function(data) {
                $(".dueInfo").empty();
                $.each(data, function(key, item) {
                    var rows = "<tr class='mainCode'>" +
                        "<td class='text-center'>" + (key + 1) + "</td>" +
                        "<td>" + item.InvoiceDate + "</td>" +
                        "<td>" + item.InvoiceNo + "</td>" +
                        "<td>" + item.Paid + "<br>Total Amount : " + item.Total + "<br> Due : " + item.Due + "<br></td>" +
                        // "<td style='width:50px'><button class='btn btn-outline-primary btn-sm btn-block' onclick='Pay(" + item.id + ")'>Pay</button></td>" +
                        "<td style='width:50px'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='Pay(" + item.id + ")'>Pay</button></td>" +
                        
                        "</tr>";
                    $('.dueInfo').append(rows);
                    "Total Amount" + item.Total;
                });
            },
        });
    };
</script>
@endsection