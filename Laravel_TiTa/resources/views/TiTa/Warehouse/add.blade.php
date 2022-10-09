@extends('TiTa.master')
@section('content')
@section('acction','Kho')
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
            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Kho</h4>
            <form class="form-horizontal style-form" action="{!! route('postthemkho') !!}" method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Nhân Viên Kho</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="sltKho">
                            @foreach($nhanvien as $key => $namenhanvien)
                                <option value="{{ $key }}">{{ $namenhanvien }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tên Sản Phẩm Kho</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtsanpham" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Số Lượng Nhập</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtsoluong" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Giá Mua</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtgiamua" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-theme pull-right">
                            <i class="fa fa-cog"></i> Button</button>
                    </div>
                </div><!-- /showback -->
            </form>
        </div>
    </div><!-- col-lg-12-->
</div><!-- /row -->

<!--main content end-->
@endsection()



