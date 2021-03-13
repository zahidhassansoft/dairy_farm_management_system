
    <div class="form-group">
        {!! Form::label('PCode','Code',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('PCode',isset($data->PCode) ? $data->PCode : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('Description','Description',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('Description',isset($data->Description) ? $data->Description : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Charge','Charge',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('Charge',isset($data->Charge) ? $data->Charge : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('ServiceCharge','Service Charge',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ServiceCharge',isset($data->ServiceCharge) ? $data->ServiceCharge : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="SCPcorTk" class="form-control">
                <option value="1" {{ isset($data->SCPcorTk) && $data->SCPcorTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->SCPcorTk) && $data->SCPcorTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('LessAmount','Less Fixed Amount',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('LessAmount',isset($data->LessAmount) ? $data->LessAmount : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('Vat','Vat',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('Vat',isset($data->Vat) ? $data->Vat : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="VatPcOrTk" class="form-control">
                <option value="1" {{ isset($data->VatPcOrTk) && $data->VatPcOrTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->VatPcOrTk) && $data->VatPcOrTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('RefFee','RefFee',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('RefFee',isset($data->RefFee) ? $data->RefFee : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="RefFeePcOrTk" class="form-control">
                <option value="1" {{ isset($data->RefFeePcOrTk) && $data->RefFeePcOrTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->RefFeePcOrTk) && $data->RefFeePcOrTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
        {!! Form::label('ReportFee','ReportFee',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ReportFee',isset($data->ReportFee) ? $data->ReportFee : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="ReportFeePcOrTk" class="form-control">
                <option value="1" {{ isset($data->ReportFeePcOrTk) && $data->ReportFeePcOrTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->ReportFeePcOrTk) && $data->ReportFeePcOrTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('CollectionFee','CollectionFee',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('CollectionFee',isset($data->CollectionFee) ? $data->CollectionFee : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="CollectionFeePcOrTk" class="form-control">
                <option value="1" {{ isset($data->CollectionFeePcOrTk) && $data->CollectionFeePcOrTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->CollectionFeePcOrTk) && $data->CollectionFeePcOrTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
        {!! Form::label('OthersFee','OthersFee',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('OthersFee',isset($data->OthersFee) ? $data->OthersFee : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="OthersFeePcOrTk" class="form-control">
                <option value="1" {{ isset($data->OthersFeePcOrTk) && $data->OthersFeePcOrTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->OthersFeePcOrTk) && $data->OthersFeePcOrTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ReportDeliverDuration','ReportDeliverDuration',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('ReportDeliverDuration',isset($data->ReportDeliverDuration) ? $data->ReportDeliverDuration : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('OutTest','OutTest',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="OutTest" class="form-control">
                <option value="Yes" {{ isset($data->OutTest) && $data->OutTest == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->OutTest) && $data->OutTest == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('CanChangePrice','CanChangePrice',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="CanChangePrice" class="form-control">
                <option value="Yes" {{ isset($data->CanChangePrice) && $data->CanChangePrice == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->CanChangePrice) && $data->CanChangePrice == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        {!! Form::label('ShowDoctorCode','ShowDoctorCode',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="ShowDoctorCode" class="form-control">
                <option value="Yes" {{ isset($data->ShowDoctorCode) && $data->ShowDoctorCode == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->ShowDoctorCode) && $data->ShowDoctorCode == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        {!! Form::label('CanGiveLess','CanGiveLess',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="CanGiveLess" class="form-control">
                <option value="Yes" {{ isset($data->CanGiveLess) && $data->CanGiveLess == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->CanGiveLess) && $data->CanGiveLess == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ReportFileName','ReportFileName',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('ReportFileName',isset($data->ReportFileName) ? $data->ReportFileName : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('IsAdjustAmt','IsAdjustAmt',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="IsAdjustAmt" class="form-control">
                <option value="Yes" {{ isset($data->IsAdjustAmt) && $data->IsAdjustAmt == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->IsAdjustAmt) && $data->IsAdjustAmt == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        {!! Form::label('IsShow','IsShow',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="IsShow" class="form-control">
                <option value="Yes" {{ isset($data->IsShow) && $data->IsShow == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->IsShow) && $data->IsShow == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('SubSubDeptName','SubSubDeptName',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="SubSubDeptName" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($SubSubDeptName as $item)
                <option value="{{$item->name}}" {{(isset($data->SubSubDeptName)&& $data->SubSubDeptName == $item->name) ? "selected" : "" }}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        {!! Form::label('SubDeptName','SubDeptName',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="SubDeptName" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($SubDeptName as $item)
                <option value="{{$item->name}}" {{(isset($data->SubDeptName)&& $data->SubDeptName == $item->name) ? "selected" : "" }}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        {!! Form::label('DeptName','DeptName',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="DeptName" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($DeptName as $item)
                <option value="{{$item->name}}" {{(isset($data->DeptName)&& $data->DeptName == $item->name) ? "selected" : "" }}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('CorporateLess','CorporateLess',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="CorporateLess" class="form-control">
                <option value="Yes" {{ isset($data->CorporateLess) && $data->CorporateLess == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ isset($data->CorporateLess) && $data->CorporateLess == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        {!! Form::label('OutdoorReportGroup','ReportGroup',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="OutdoorReportGroup" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($SubSubDeptName as $item)
                <option value="{{$item->name}}" {{(isset($data->OutdoorReportGroup)&& $data->OutdoorReportGroup == $item->name) ? "selected" : "" }}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        {!! Form::label('IndoorBillGroup','IndoorBillGroup',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            <select name="IndoorBillGroup" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($IndoorBill as $item)
                <option value="{{$item->name}}" {{(isset($data->IndoorBillGroup)&& $data->IndoorBillGroup == $item->name) ? "selected" : "" }}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('AcCode','AcCode',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('AcCode',isset($data->AcCode) ? $data->AcCode : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('AcName','AcName',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('AcName',isset($data->AcName) ? $data->AcName : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group text-center">
        {!! Form::submit('Submit ', ['class'=> 'btn btn-primary']) !!}
    </div>

