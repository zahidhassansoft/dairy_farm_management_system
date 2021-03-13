
    <div class="form-group">
        {!! Form::label('Code','Code',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('Code',isset($data->Code) ? $data->Code : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Description','Description',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('Description',isset($data->Description) ? $data->Description : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Alias1','Alias1',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('Alias1',isset($data->Alias1) ? $data->Alias1 : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Alias2','Alias2',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('Alias2',isset($data->Alias2) ? $data->Alias2 : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('AcType','A/C Type',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('AcType',isset($data->AcType) ? $data->AcType : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group text-center">
        {!! Form::submit('Submit ', ['class'=> 'btn btn-primary']) !!}
    </div>