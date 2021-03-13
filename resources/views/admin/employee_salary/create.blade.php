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
                {!! Form::open(['url' => '/employeesalary', 'method' =>'post', 'id'=>'validate', 'class'=>'formsave']) !!}
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
                                        <input type="text" name="pay_date" id="pay_date" value="" class="form-control datepicker" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Month <span class="validate">*</span> :</label>
                                        <select class="form-control" name="month" id="month" required>
                                            <option value="">-- Select --</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="years">Select Year <span class="validate">*</span> :</label>
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="">-- Select --</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="employeeList">Select Employee <span class="validate">*</span> :</label>
                                        <select class="form-control" name="employee_id" id="employee_id" required>
                                            <option value="">-- Select --</option>
                                            @foreach($employee as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Monthly Salary :</label>
                                        <input type="text" name="salary_amount" id="salary_amount" value="" class="form-control" readonly>
                                        <input type="text" name="eid" id="eid" value="" class="hidden" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note :</label>
                                        <textarea name="note" class="form-control"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" id="saveInfo"><i class="fa fa-floppy-o"></i><b>Save</b></button>
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
                url: "getemployeesalary/" + d,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#salary_amount').val(data.salary);
                    $('#eid').val(data.employeeId);
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