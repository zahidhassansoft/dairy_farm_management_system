@extends('admin.master.layout')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chart Of Accs</h3>
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
                                        <th class="col-md-1">Sl</th>
                                        <th class="col-md-2">Code</th>
                                        <th class="col-md-2">Description</th>
                                        <th class="col-md-2">A/C Type</th>
                                        <th class="col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $index => $chartofacc)
                                    <tr> 
                                        <td>{{$index +1}}</td>
                                        <td>{{ $chartofacc->Code }}</td>
                                        <td>{{ $chartofacc->Description }}</td>
                                        <td>{{ $chartofacc->AcType }}</td>
                                        <td>
                                           <a class="btn btn-primary" href="{{ route('chartofaccs.edit',$bed->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['chartofaccs.destroy', $bed->id],'style'=>'display:inline']) !!}
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
                        <a href="{{ route('chartofaccs.create') }}" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection