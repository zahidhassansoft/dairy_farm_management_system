@extends('admin.master.layout')

@section('content')
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Sale Milk</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sale Milk</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-success">
                {!! Form::open(['url' => '/salemilkstore', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Sale Milk :</div>
                            <div class="panel-body">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="accNo">Account Number</label>
                                    <div class="col-md-8">
                                        <select name="accNo" class="form-control" id="accNo">
                                            <option value="0">---Select---</option>
                                            @foreach($data as $row)
                                            <option value="{{$row->account_no}}">{{$row->account_no}} [Collected Milk : {{$row->litre}} Litre]</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="name">Name <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="contact">Mobile No <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="contact" id="contact" class="form-control isnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="contact">Sale Date</label>
                                    <div class="col-md-8">
                                        <input type="date" name="sale_date" id="sale_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="email">Email <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="address">Address </label>
                                    <div class="col-md-8">
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="litre">Litre <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="litre" id="litre" class="form-control isnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pricelitre">Price & Rest </label>
                                    <div class="col-md-4">
                                        <input type="text" name="pricelitre" id="pricelitre" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="duemilk" id="duemilk" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="total">Total</label>
                                    <div class="col-md-8">
                                        <input type="text" name="total" id="total" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="paid">Paid <span class="validate">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="paid" id="paid" class="form-control isnumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="due">Due </label>
                                    <div class="col-md-8">
                                        <input type="text" name="due" id="due" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="save" class="col-sm-3"></label>
                                    <div class="col-md-8 text-right">
                                        <button class="btn btn-success" id="save">Save</button>
                                        <a href="{{url('salemilklist')}}" class="btn btn-primary" id="list">List</a>
                                    </div>
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

    $("#litre").on('keyup', function() {
        var val1 = parseFloat($("#litre").val());
        var val2 = parseFloat($("#pricelitre").val());

        var lnResult = val1 * val2;
        $("#total").val(lnResult);
    });

    $("#paid").on('keyup', function() {
        var val1 = parseFloat($("#total").val());
        var val2 = parseFloat($("#paid").val());

        var lnResult = val1 - val2;
        $("#due").val(lnResult);

        var paid = $('#paid').val();
        var ttl = $('#total').val();
        if (paid > ttl) {
            alert('Please check your given amount');
        }
    });

    $(document).ready(function() {

        $('#validate').validate({
            rules: {
                name: "required",
                contact: {
                    required: true,
                    maxlength: 15,
                    minlength: 10,
                },
                email: "required",
                litre: "required",
                paid: "required",
            },
            messages: {
                name: "Please enter your name",
                contact: "Please check your phone number",
                email: "Please enter your e-mail",
                litre: "Plese enter litre",
                paid: "Please enter amount",
            },
        });

        $('#accNo').change(function() {
            $.ajax({
                url: "getmilkinfo",
                data: {
                    "accNo": $("#accNo").val()
                },
                dataType: "html",
                type: "post",
                success: function(data, item) {
                    var d = JSON.parse(data);
                    $('#pricelitre').val(d[0].price);
                    $('#duemilk').val(d[0].litre);
                }
            });
        });
    });
</script>
@endsection