
    <div class="form-group">
        {!! Form::label('BedNo','Bed No',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('BedNo',isset($data->BedNo) ? $data->BedNo : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('CabinNo','Room No',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('CabinNo',isset($data->CabinNo) ? $data->CabinNo : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('FloorNo','Floor No',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="FloorNo" class="form-control">
                <option value="Groud Floor" {{ isset($data->FloorNo) && $data->FloorNo == 'Groud Floor' ? 'selected' : '' }}>Groud Floor</option>
                <option value="2nd Floor" {{ isset($data->FloorNo) && $data->FloorNo == '2nd Floor' ? 'selected' : '' }}>2nd Floor</option>
                <option value="3rd Floor" {{ isset($data->FloorNo) && $data->FloorNo == '3rd Floor' ? 'selected' : '' }}>3rd Floor</option>
                <option value="4th Floor" {{ isset($data->FloorNo) && $data->FloorNo == '4th Floor' ? 'selected' : '' }}>4th Floor</option>
                <option value="5th Floor" {{ isset($data->FloorNo) && $data->FloorNo == '5th Floor' ? 'selected' : '' }}>5th Floor</option>
                <option value="6th Floor" {{ isset($data->FloorNo) && $data->FloorNo == '6th Floor' ? 'selected' : '' }}>6th Floor</option>
                <option value="7th Floor" {{ isset($data->FloorNo) && $data->FloorNo == '7th Floor' ? 'selected' : '' }}>7th Floor</option>
                <option value="8th Floor" {{ isset($data->FloorNo) && $data->FloorNo == '8th Floor' ? 'selected' : '' }}>8th Floor</option>
            </select>
        </div>
        {!! Form::label('KindsofBed','Bed Type',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="KindsofBed" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($bedType as $item)
                <option value="{{$item->BedCetagoryName}}" {{(isset($data->KindsofBed)&& $data->KindsofBed == $item->BedCetagoryName) ? "selected" : "" }}>{{$item->BedCetagoryName}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Description','Description',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('Description',isset($data->Description) ? $data->Description : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('SubSubPno','Department',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="SubSubPno" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($department as $item)
                <option value="{{$item->SubSubPno}}" {{(isset($data->SubSubPno)&& $data->SubSubPno == $item->SubSubPno) ? "selected" : "" }}>{{$item->SubSubPno}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ChargePerDay','Charge/Day',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('ChargePerDay',isset($data->ChargePerDay) ? $data->ChargePerDay : null, ['class'=> 'form-control']) !!}
        </div>
        {!! Form::label('ServiceCharge','Service Charge',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ServiceCharge',isset($data->ServiceCharge) ? $data->ServiceCharge : null, ['class'=> 'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <select name="PCorTk" class="form-control">
                <option value="1" {{ isset($data->PCorTk) && $data->PCorTk == 'Tk.' ? 'selected' : '' }}>Tk.</option>
                <option value="0" {{ isset($data->PCorTk) && $data->PCorTk == '%' ? 'selected' : '' }}>%</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Status','Status',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="Status" class="form-control">
                <option value="Running" {{ isset($data->Status) && $data->Status == 'Running' ? 'selected' : '' }}>Running</option>
                <option value="Not Running" {{ isset($data->Status) && $data->Status == 'Not Running' ? 'selected' : '' }}>Not Running</option>
            </select>
        </div>
        {!! Form::label('AdmissionCharge','Admission Charge',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('AdmissionCharge',isset($data->AdmissionCharge) ? $data->AdmissionCharge : null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('BedFacilities','Bed Category',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="BedFacilities" class="form-control">
                <option value="Regular" {{ isset($data->payment_status) && $data->payment_status == 'Regular' ? 'selected' : '' }}>Regular</option>
                <option value="Extra" {{ isset($data->payment_status) && $data->payment_status == 'Extra' ? 'selected' : '' }}>Extra</option>
            </select>
        </div>
        {!! Form::label('CanteenCategory','Canteen Category',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            <select name="BedType" class="form-control">
                <option value="0">-- Select --</option>
                @foreach($canteenCat as $item)
                <option value="{{$item->MealType}}" {{(isset($data->MealType)&& $data->MealType == $item->MealType) ? "selected" : "" }}>{{$item->MealType}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group text-center">
        {!! Form::submit('Submit ', ['class'=> 'btn btn-primary']) !!}
    </div>