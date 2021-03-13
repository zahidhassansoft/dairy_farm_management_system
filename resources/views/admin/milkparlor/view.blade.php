@extends('admin.master.rptLayout')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <label class="col-sm-3">Name</label>
        <label class="col-sm-8">: {{$data[0]->Name}}</label>

        <label class="col-sm-3">Phone No</label>
        <label class="col-sm-8">: {{$data[0]->MobileNo}}</label>

        <label class="col-sm-3">E-Mail</label>
        <label class="col-sm-8">: {{$data[0]->Email}}</label>

        <label class="col-sm-3">Address</label>
        <label class="col-sm-8">: {{$data[0]->Address}}</label>
    </div>
    <div class="col-sm-6 text-right">
        <label class="col-sm-5">Invoice No</label>
        <label class="col-sm-3">: {{$data[0]->InvoiceNo}}</label>

        <label class="col-sm-5">Invoice Date</label>
        <label class="col-sm-3">: {{ date('Y-m-d', strtotime($data[0]->InvoiceDate))}}</label>
    </div>
</div>
<hr>
<main>
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <label class="col-sm-7 text-right">Litre</label>
            <label class="col-sm-4 text-right">{{$data[0]->Litre}} Litre</label>

            <label class="col-sm-7 text-right">Price Per Litre</label>
            <label class="col-sm-4 text-right">{{$data[0]->PriceLitre}} ৳</label>

            <label class="col-sm-7 text-right">Total</label>
            <label class="col-sm-4 text-right">{{$data[0]->Total}} ৳</label>

            <label class="col-sm-7 text-right">Paid</label>
            <label class="col-sm-4 text-right">{{$data[0]->Paid}} ৳</label>

            <label class="col-sm-7 text-right">Due</label>
            <label class="col-sm-4 text-right text-primary" id="due" value="{{$data[0]->Due}}">{{$data[0]->Due}} ৳</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h5 class="text-success">Thanks for donating your time to our organization.</h5>
        </div>
    </div>
</main>
@endsection


@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(('#due').val() == 0){
        alert('adf');
    }

    $('.delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
@endsection