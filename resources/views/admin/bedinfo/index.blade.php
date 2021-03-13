@extends('admin.master.layout')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bed Information</h3>
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
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th class="col-md-1">BedNo</th>
                                        <th class="col-md-1">FloorNo</th>
                                        <th class="col-md-1">CabinNo</th>
                                        <th class="col-md-1">Charge/Day</th>
                                        <th class="col-md-1">ServiceCharge</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">BedType</th>
                                        <th class="col-md-1">SubSubPno</th>
                                        <th class="col-md-1">AdmCharge</th>
                                        <th class="col-md-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $index => $bed)
                                    <tr> 
                                        <td>{{$index +1}}</td>
                                        <td>{{ $bed->BedNo }}</td>
                                        <td>{{ $bed->FloorNo }}</td>
                                        <td>{{ $bed->CabinNo }}</td>
                                        <td>{{ $bed->ChargePerDay }}</td>
                                        <td>{{ $bed->ServiceCharge }}</td>
                                        <td>{{ $bed->Status }}</td>
                                        <td>{{ $bed->BedType }}</td>
                                        <td>{{ $bed->SubSubPno }}</td>
                                        <td>{{ $bed->AdmissionCharge }}</td>
                                        <td>
                                           <a class="btn btn-primary" href="{{ route('bedinformations.edit',$bed->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['bedinformations.destroy', $bed->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="{{ route('bedinformations.create') }}" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection