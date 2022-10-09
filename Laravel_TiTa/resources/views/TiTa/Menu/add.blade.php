@extends('TiTa.master')
@section('content')
@section('acction','Menu - Thực đơn')
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <b>Oh snap ! </b> {!! $error !!} .<br>
        @endforeach
    </div>
@endif
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <form class="form-horizontal style-form" action="" method="POST" enctype="multipart/form-data">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"> Form Menu</h4>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="module form-module">
                        <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                            <div class="tooltip">Click Me</div>
                        </div>
                        <div class="form">
                            <h2>Thêm ảnh</h2>
                        </div>
                        <div class="form">
                            <h2>Chọn hình ảnh</h2>
                            <form>
                                <input type="file" name="fImages[]"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tên menu</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtmenu" class="form-control" placeholder="Menu" value="{!! old('txtmenu') !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Loại menu</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="sltDanhmuc">
                            <option value="">Chọn menu</option>
                            <?php danhmucid($danhmuc,0," ",old('sltDanhmuc')); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea name="txtmota" class="form-control" rows="3">{!! old('txtmota') !!}</textarea>
                        <script type="text/javascript">ckeditor("txtmota")</script>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-theme pull-right" onclick="myFunction()">
                            <i class="fa fa-cog"></i> Button</button>
                    </div>
                </div><!-- /showback -->

        </div>
    </form>
    </div><!-- col-lg-12-->
</div><!-- /row -->

<!--main content end-->
@endsection()

