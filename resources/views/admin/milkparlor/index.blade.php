@extends('admin.master.layout')

@section('content')

<script>
  $(document).ready(function() {
    $('#stallNo').change(function() {
      $.ajax({
        url: "getcowid",
        data: {
          "stallNo": $("#stallNo").val()
        },
        dataType: "html",
        type: "post",
        success: function(data) {
          var obj = JSON.parse(data);
          $('#animalId').html('<option value="">---Select---</option>');
          obj.forEach(function(animal) {
            var value = animal.animal_id;
            $('#animalId').append('<option value="' + value + '">' + value + '</option>');
          });
        }
      });
    });
  });
</script>
<!-- ifsession()->flash('success','Post Save Successfully'); -->
@if(session()->has('success'))
@endif
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
        {!! Form::open(['url' => '/storemilk', 'method' =>'post', 'id'=>'validate','class'=>'formsave']) !!}
        @csrf
        <div class="box-body">
          <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Milk collected Information:</div>
              <div class="panel-body">
                @if(session('message'))
                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                @endif
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="accNo">Account Number :</label>
                  <div class="col-md-8">
                    <input type="text" name="accNo" id="accNo" class="form-control" placeholder="( Auto Generate)" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="collectorName">Collector Name : <span class="validate">*</span></label>
                  <div class="col-md-8">
                    <input type="text" name="collectorName" id="collectorName" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="collectorName">Collect Date : <span class="validate">*</span></label>
                  <div class="col-md-8">
                    <input type="date" name="collectDate" id="collectDate" class="form-control">
                  </div>
                </div>
                <!-- <div class="form-group row col-sm-12">
                <label class="col-md-2 col-form-label" for="address">Address :</label>
                <div class="col-md-10" style="margin-left: -5px; width:947px">
                  <textarea name="address" id="address" class="form-control"></textarea>
                </div>
              </div> -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="stallNo">Stall No :</label>
                  <div class="col-md-8">
                    <select name="stallNo" id="stallNo" class="form-control" required>
                      <option value="0">---Select---</option>
                      @foreach($stall as $key => $value)
                      <option value="{{$value->id}}">{{$value->stall_no}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="animalId">Animal Id :</label>
                  <div class="col-md-8">
                    <select name="animalId" id="animalId" class="form-control">
                      <option value="0">---Select---</option>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="litre">Litre : <span class="validate">*</span></label>
                  <div class="col-md-8">
                    <input type="text" name="litre" id="litre" class="form-control isnumber" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="price">Price per litre : <span class="validate">*</span></label>
                  <div class="col-md-8">
                    <input type="text" name="price" id="price" class="form-control isnumber" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="totalAmount">Total Amount : <span></span></label>
                  <div class="col-md-8">
                    <input type="text" name="totalAmount" id="totalAmount" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <div for="save" class="col-sm-12 text-right">
                    <button class="btn btn-success" id="save">Save</button>
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

  $("#litre,#price").on('keyup', function() {
    console.log(this.value);
    var val1 = parseFloat($("#litre").val());
    var val2 = parseFloat($("#price").val());

    var lnResult = val1 * val2;
    $("#totalAmount").val(lnResult);
  });

  $(document).ready(function() {
    $('#validate').validate({
      rules: {
        collectorName: "required",
        collectDate: "required",
        litre: "required",
        price: "required",

      },
      messages: {
        collectorName: "Please enter collector name",
        collectDate: "Please enter Collect Date",
        litre: "Enter litre",
        price: "Enter amount per litre",
      },
    });
  });
</script>
@endsection