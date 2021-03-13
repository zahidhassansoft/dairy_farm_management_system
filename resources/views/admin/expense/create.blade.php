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
            <h1><i class="fa fa-user" aria-hidden="true"></i> Expense Information</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Expense Information</li>
            </ol>
        </section>
        <section class="content">
            @if(session('message'))
            <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
            @endif
            <!-- Default box -->
            <div class="box box-success">
                {!! Form::open(['url' => 'expense', 'method' =>'post', 'id'=>'validate', 'class'=>'formsave']) !!}
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
                                            @foreach($data as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Expense Date <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="expense_date" data-date-format="Y-m-d"  class="form-control datepicker" id="expense_date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Details</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Total Amount<span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="total_amount" class="form-control isnumber" id="total_amount">
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
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-1y',
        endDate: '0d',
        autoclose: true,
    });
    $(document).ready(function() {
        $('#validate').validate({
            rules: {
                purpose_name: "required",
                expense_date: "required",
                total_amount: {
                    required: true,
                    number: true
                },
            },
            messages: {
                purpose_name: "Please select expense purposes",
                expense_date: "Please enter expense date",
                total_amount: "Please check amount",
            },
        });
    });
</script>
@endsection