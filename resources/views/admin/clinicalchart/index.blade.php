@extends('admin.master.layout')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Clinical Chart</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (Session::has('message'))
                            <div class="text-center alert-danger">{{ Session::get('message') }}</div>
                        @endif
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="datatable" class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th class="col-md-1">PCode</th>
                                        <th class="col-md-4">Description</th>
                                        <th class="col-md-1">Charge</th>
                                        <th class="col-md-1">ServiceCharge</th>
                                        <th class="col-md-1">SubSubDeptName</th>
                                        <th class="col-md-1">SubDeptName</th>
                                        <th class="col-md-1">DeptName</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $index => $chart)
                                    <tr> 
                                        <td>{{$index +1}}</td>
                                        <td>{{ $chart->PCode }}</td>
                                        <td>{{ $chart->Description }}</td>
                                        <td>{{ $chart->Charge }}</td>
                                        <td>{{ $chart->ServiceCharge }}{{ $chart->SCPcorTk }}</td>
                                        <td>{{ $chart->SubSubDeptName }}</td>
                                        <td>{{ $chart->SubDeptName }}</td>
                                        <td>{{ $chart->DeptName }}</td>
                                        <td class="align-middle">
                                            <a class="btn btn-sm btn-primary" href="{{ url('/clinicalcharts/'.$chart->id.'/edit') }}">Edit</a>
                                        </td>
                                        <td class="align-middle">
                                            {!! Form::open([ 'method' => 'Delete', 'url' => ['/clinicalcharts', $chart->id]]) !!}
                                            {!! Form::submit('Delete',['class'=>'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}                                        
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="/clinicalcharts/create" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection