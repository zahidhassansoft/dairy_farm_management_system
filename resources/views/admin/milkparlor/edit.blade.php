@extends('admin.master.layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-tint"></i> Collect Milk</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Collect Milk</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => ['/storemilk',$data->id], 'method' =>'PATCH', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-info-circle"></i>&nbsp;Milk collected Information:</div>
                            <div class="panel-body">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="accNo">Account Number :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="accNo" id="accNo" class="form-control" value="{{$data->account_no}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="collectorName">Collector Name : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="collectorName" id="collectorName" class="form-control" value="{{$data->collected_from}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="collectorName">Collect Date : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="date" name="collectDate" id="collectDate" class="form-control" value="{{date('Y-m-d',strtotime($data->collected_date)) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="stallNo">Stall No :</label>
                                    <div class="col-md-8">
                                        <select name="stallNo" id="stallNo" class="form-control">
                                            <option value="0">---Select---</option>
                                            @foreach($stall as $key => $value)
                                            <option value="{{$value->id}}" {{ (isset($data->stall_no)&& $data->stall_no == $value->id) ? "selected" : ""}}>{{$value->stall_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="animalId">Animal Id :</label>
                                    <div class="col-md-8">
                                        <select name="animalId" id="animalId" class="form-control">
                                            <option value="{{$data->animal_id}}">{{$data->animal_id}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="litre">Litre : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="litre" id="litre" class="form-control" value="{{$data->liter}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="price">Price per litre : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="price" id="price" class="form-control" value="{{$data->price_liter}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="totalAmount">Total Amount : <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="totalAmount" id="totalAmount" class="form-control" value="{{$data->total_price}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="save" class="col-sm-3"></label>
                                    <div class="col-sm-9 text-right">
                                        <button class="btn btn-success" id="save">Update</button>
                                        <a href="{{url('collectedmilklist')}}" class="btn btn-primary" id="list">List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{ csrf_field() }}
                {!! Form::close() !!}
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
    $(".datepicker2").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: '2000:2050',
        dateFormat: 'yy-mm-dd'
    });

    $("#litre,#price").on('keyup', function() {
        console.log(this.value);
        var val1 = parseFloat($("#litre").val());
        var val2 = parseFloat($("#price").val());

        var lnResult = val1 * val2;
        $("#totalAmount").val(lnResult);
    });
    $(document).ready(function() {
        $('#stallNo').change(function() {
            var animal_id = $("#stallNo").val();
            $.ajax({
                url: "http://127.0.0.1:8000/milkparlor/loadaimalno/" + animal_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    var obj = JSON.parse(JSON.stringify(data));
                    $('#animalId').html('<option value="">---Select---</option>');
                    obj.forEach(function(animal) {
                        // var id = animal.id;
                        var value = animal.animal_id;
                        $('#animalId').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
        });
    });

    $(document).ready(function() {
        $('#validate').validate({
            rules: {
                collectorName: "required",
                litre: "required",
                price: "required",
            },
            messages: {
                collectorName: "Please enter collector name",
                litre: "Enter litre",
                price: "Enter amount per litre",
            },
        });
    });
</script>
@endsection