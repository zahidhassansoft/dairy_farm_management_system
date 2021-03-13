@extends('admin.master.layout')

@section('content')
    <section class="content-header">
      <h1>Sales Collection</h1>
    </section>
    <section class="content">
        <div class="row">
            {!! Form::open(['url' => '/getreports',"target"=>"_blank", 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Customer</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="txtCustomer" name="customer_id"">
                                    <option value="0">-- Select --</option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}} - {{$customer->mobile}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date From</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control datepicker" name="date_from" />
                            </div>
                            <label class="col-sm-2 control-label">To</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control datepicker" name="date_to" />
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
