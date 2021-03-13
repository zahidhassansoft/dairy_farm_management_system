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
            <h1><i class="fa fa-user-circle"></i> Employee Salary</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Employee Salary</li>
            </ol>
        </section>
        <section class="content">

            <!-- Default box -->
            <div class="box box-success">
                {!! Form::open(['url' => ['employeesalary',$data->id], 'method' =>'PATCH', 'id'=>'validate', 'class'=>'formsave']) !!}
                @csrf
                <div class="box-body">
                    <section class="content">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                @if(session('message'))
                                <div class="alert alert-success" id="message" style="display:block;color:green">{{session('message')}}</div>
                                @endif
                                <div class="panel-heading"><i class="fa fa-list" aria-hidden="true"></i> Salary Info</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Pay Date <span class="validate">*</span> :</label>
                                        <input type="text" name="payment_date" id="payment_date" value="{{$data->payment_date}}" class="form-control datepicker" autocomplete="off" required>
                                        <input type="hidden" name="payment_id" id="payment_id" value="{{$data->payment_no}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Month <span class="validate">*</span> :</label>
                                        <select class="form-control" name="month" id="month" required>
                                            <option value="">-- Select --</option>
                                            <option value="January" {{ $data->month == 'January' ? 'selected' : '' }}>January</option>
                                            <option value="February" {{ $data->month == 'February' ? 'selected' : '' }}>February</option>
                                            <option value="March" {{ $data->month == 'March' ? 'selected' : '' }}>March</option>
                                            <option value="April" {{ $data->month == 'April' ? 'selected' : '' }}>April</option>
                                            <option value="May" {{ $data->month == 'May' ? 'selected' : '' }}>May</option>
                                            <option value="June" {{ $data->month == 'June' ? 'selected' : '' }}>June</option>
                                            <option value="July" {{ $data->month == 'July' ? 'selected' : '' }}>July</option>
                                            <option value="August" {{ $data->month == 'August' ? 'selected' : '' }}>August</option>
                                            <option value="September" {{ $data->month == 'September' ? 'selected' : '' }}>September</option>
                                            <option value="October" {{ $data->month == 'October' ? 'selected' : '' }}>October</option>
                                            <option value="November" {{ $data->month == 'November' ? 'selected' : '' }}>November</option>
                                            <option value="December" {{ $data->month == 'December' ? 'selected' : '' }}>December</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="years">Select Year <span class="validate">*</span> :</label>
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="">-- Select --</option>
                                            <option value="2021" {{ $data->year == '2021' ? 'selected' : '' }}>2021</option>
                                            <option value="2020" {{ $data->year == '2020' ? 'selected' : '' }}>2020</option>
                                            <option value="2019" {{ $data->year == '2019' ? 'selected' : '' }}>2019</option>
                                            <option value="2018" {{ $data->year == '2018' ? 'selected' : '' }}>2018</option>
                                            <option value="2017" {{ $data->year == '2017' ? 'selected' : '' }}>2017</option>
                                            <option value="2016" {{ $data->year == '2016' ? 'selected' : '' }}>2016</option>
                                            <option value="2015" {{ $data->year == '2015' ? 'selected' : '' }}>2015</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="employeeList">Select Employee <span class="validate">*</span> :</label>
                                        <select class="form-control" name="employee_id" id="employee_id" required>
                                            <option value="">-- Select --</option>
                                            @foreach($employee as $row)
                                            <option value="{{$row->id}}" {{(isset($data->employee_name) && $data->employee_name == $row->id) ? "selected" : "" }} >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Monthly Salary :</label>
                                        <input type="text" name="salary_amount" id="salary_amount" value="{{$data->monthly_salary}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note :</label>
                                        <textarea name="note" class="form-control">{{$data->note}}</textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" id="saveInfo"><i class="fa fa-floppy-o"></i><b>Update</b></button>
                                        <a href="{{url('employeesalary')}}" class="btn btn-warning "><i class="fa fa-list"></i> <b> list</b></a>
                                    </div>
                                </div>
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
    $(document).ready(function() {
        $('#employee_id').on('change', function() {
            var d = $(this).val();
            console.log(d);
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/employeesalary/getemployeesalary/" + d,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#salary_amount').val(data.salary);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#validate').validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Please enter name",
            },
        });
    });
</script>
@endsection