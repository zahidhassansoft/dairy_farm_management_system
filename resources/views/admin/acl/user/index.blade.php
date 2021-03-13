@extends('admin.master.layout')

@section('content')
<section class="content-wrapper">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">User Managment</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
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
                <div class="box-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>UserName</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th width="210px">Action</th>
                                </tr>
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="text-center">
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="{{route('users.create')}}" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection