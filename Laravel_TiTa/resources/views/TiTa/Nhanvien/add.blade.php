@extends('TiTa.master')
@section('content')
@section('acction','Nhân viên')
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <b>Oh snap ! </b> {!! $error !!} .<br>
        @endforeach
    </div>
@endif
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <form class="form-horizontal style-form" action="" method="POST">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"> Nhân viên</h4>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="txttennv" class="form-control" placeholder="Name" value="{!! old('txttennv') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Chức vụ</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="sltChucvu"  {!! old('sltChucvu') !!}>
                            <option value="">Chọn chức vụ</option>
                            <option value="2">Quản lý</option>
                            <option value="3">Thu Ngân</option>
                            <option value="4">Kho Hàng</option>
                            <option value="5">Bán hàng/Giao Hàng</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Number Phone</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="11"  name="txtsdt" class="form-control" value="{!! old('txtsdt') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtemail" class="form-control" value="{!! old('txtemail') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">CMND</label>
                    <div class="col-sm-10">
                        <input type="text"  maxlength="9" name="txtcmnd" class="form-control" value="{!! old('txtcmnd') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text"  name="txtdiachi" class="form-control" value="{!! old('txtdiachi') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password"  name="txtpassword" class="form-control" value="{!! old('txtpassword') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-theme pull-right">
                            <i class="fa fa-cog"></i> Button</button>
                    </div>
                </div><!-- /showback -->

            </div>
        </div>
    </form>
</div><!-- col-lg-12-->

<!--main content end-->
@endsection()

