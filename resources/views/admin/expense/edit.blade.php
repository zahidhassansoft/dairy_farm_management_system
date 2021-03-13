@extends('admin.master.layout')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->

    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-user" aria-hidden="true"></i> Supplier Profile Information</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Supplier Profile Information</li>
            </ol>
        </section>
        <section class="content">
            @if(session('message'))
            <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
            @endif
            <!-- Default box -->
            <div class="box box-success">
                {!! Form::open(['url' => ['expense',$data->id], 'method' =>'PATCH', 'id'=>'validate', 'class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New Purpose:</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Purpose Name<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <select name="purpose_name" id="purpose_name" class="form-control">
                                            <option value="0">---Select---</option>
                                            @foreach($purpose as $value)
                                            <option value="{{$value->id}}" {{ (isset($data->id)&& $data->id == $value->id) ? "selected" : ""}} >{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Expense Date <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="expense_date" class="form-control" id="expense_date" value="{{$data->date}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Details <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="details" id="details" cols="30" rows="5">{{$data->details}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Total Amount<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="total_amount" class="form-control isnumber" id="total_amount" value="{{$data->total_amount}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <b>Save</b></button>
                            &nbsp;
                            <a href="{{url('expense')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> List</b></a>
                        </div>
                    </div>
                    <input type="hidden" name="invoice_no" value="{{$data->invoice_no}}">
                    <input type="hidden" name="invoice_date" value="{{$data->invoice_date}}">
                </div>
            </div>
        </section>
    </div>
</div>
{{ csrf_field() }}
{!! Form::close() !!}
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
    $(document).ready(function() {

        $('#expense_date').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
        
        $('#validate').validate({
            rules: {
                purpose_name: "required",
                expense_date: "required",
                total_amount: {
                    required:true,
                    number:true
                },
            },
            messages: {
                purpose_name: "Please select purposes",
                expense_date: "Please enter expense date",
                total_amount: "Please check amount",
            },
        });
    });
</script>
@endsection