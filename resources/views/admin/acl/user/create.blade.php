@extends('admin.master.layout')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New User</h3>
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
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>UserName:</strong>
                            {!! Form::text('username', null, array('placeholder' => 'UserName','class' => 'form-control', 'id'=>'txtUserName')) !!}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'id'=>'txtName')) !!}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'id'=>'txtEmail')) !!}
                        </div>
                        <div class="form-group">
                            <strong>Designation:</strong>
                            {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control', 'id'=>'txtDesignation')) !!}
                        </div>
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'id'=>'txtPassword')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Menu Item:</strong>
                            <ul class="trees">
                                @foreach($menus as $menu)
                                <li id="parent">
                                    <input type="checkbox" class="menus" value="{{$menu->id}}"> {{$menu->name}}
                                    <input type="number" class="form-control slno" value="0">
                                    @if(count($menu->childs))
                                        @include('admin.acl.user.childs',['childs' => $menu->childs])
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" onclick="Save();">Submit</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
      $("li:has(li) > input[type='checkbox']").change(function() {
        $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
      });
      $("input[type='checkbox'] ~ ul input[type='checkbox']").change(function() {
        $(this).closest("li:has(li)").children("input[type='checkbox']").prop('checked', $(this).closest('ul').find("input[type='checkbox']").is(':checked'));
      });
    });


    function Save() {
        var res = validation();
        if (res == true) {
            var vouchers = [];
            if ($('[class="menus"]:checked').length > 0) {
                $('.trees').find('input.menus:checkbox:checked').each(function () {
                    var tParentMenu = $(this).closest('#parent').find('.menus').val();
                    var tMenuSl = $(this).closest('li').find('.slno').val();
                    var tMenuId = $(this).val();
                    var voucher = {
                        parentMenu: tParentMenu,
                        menuId: tMenuId,
                        menuSl: tMenuSl,
                        username: $('#txtUserName').val(),
                        name: $('#txtName').val(),
                        email:$('#txtEmail').val(),
                        designation:$('#txtDesignation').val(),
                        password: $('#txtPassword').val(),
                    };
                    vouchers.push(voucher);
                });
            } else {alert('please select checkbox item..');}
            $.ajax({
                type: "POST",
                url: '/users',
                data: {data:vouchers,_token: "{{ csrf_token() }}"},
                success: function (data) {
                    if(data==""){
                        alert("Save Success.")
                        location.href = '/users';
                    }
                }
            });
        }
    }

function validation() {
var isValid = true;
if ($("#txtUserName").val() == '') { $('#txtUserName').css('border-color', 'red'); isValid=false; }else { $('#txtUserName').css('border-color', 'lightgrey'); }
if ($("#txtPassword").val() == '') { $('#txtPassword').css('border-color', 'red'); isValid=false; }else { $('#txtPassword').css('border-color', 'lightgrey'); }
if ($("#txtName").val() == '') { $('#txtName').css('border-color', 'red'); isValid=false; }else { $('#txtName').css('border-color', 'lightgrey'); }
if ($("#txtDesignation").val() == '') { $('#txtDesignation').css('border-color', 'red'); isValid=false; }else { $('#txtDesignation').css('border-color', 'lightgrey'); }
if ($("#txtEmail").val() == '') { $('#txtEmail').css('border-color', 'red'); isValid=false; }else { $('#txtEmail').css('border-color', 'lightgrey'); }
return isValid;
}
</script>
@endsection

