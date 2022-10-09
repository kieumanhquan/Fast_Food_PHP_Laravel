@extends('TiTa.master')
@section('content')
@section('acction','Cập nhật thông tin')
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <b>Oh snap ! </b> {!! $error !!} .<br>
        @endforeach
    </div>
@endif
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Quản lý</h4>
            <form class="form-horizontal style-form"  method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="disabledInput" disabled name="txttennv" class="form-control" value="{!! old('txttennv',isset($nvien) ? $nvien['name'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">CMND</label>
                    <div class="col-sm-10">
                        <input type="text" id="disabledInput" disabled name="txtcmnd" class="form-control" value="{!! old('txtcmnd',isset($nvien) ? $nvien['CMND'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Chức vụ</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="sltChucvu">
                            <option value="">Chọn chức vụ</option>
                            <option value="2">Quản lý</option>
                            <option value="3">Thu Ngân</option>
                            <option value="4">Kho Hàng</option>
                            <option value="5">Bán hàng/Giao Hàng</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Địa Chỉ</label>
                    <div class="col-sm-10">
                        <input type="text"  name="txtdiachi" class="form-control" value="{!! old('txtdiachi',isset($nvien) ? $nvien['diachi'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">SĐT</label>
                    <div class="col-sm-10">
                        <input type="text"  name="txtsdt" class="form-control" value="{!! old('txtsdt',isset($nvien) ? $nvien['sdt'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text"  name="txtemail" class="form-control" value="{!! old('txtemail',isset($nvien) ? $nvien['email'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-theme pull-right" onclick="myFunction()">
                            <i class="fa fa-cog"></i> Button</button>
                    </div>
                </div><!-- /showback -->

            </form>
        </div>
    </div><!-- col-lg-12-->
</div><!-- /row -->

@endsection()

