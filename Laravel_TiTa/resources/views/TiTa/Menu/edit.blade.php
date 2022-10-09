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
<style>
    .img_detail{width: 250px;margin-bottom: 30px}
    .icon_del{position: relative;top: -151px;left: 212px;}
    #insert{margin-top: 20px;}
</style>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <form class="form-horizontal style-form" action="" method="POST" enctype="multipart/form-data">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Form Menu</h4>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="module form-module">
                        <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                            <div class="tooltip">Click Me</div>
                        </div>
                        @foreach($menu_image as $key => $item )
                        <div class="form" id="{!! $key !!}">
                            <h2> Ảnh</h2>
                            <img class="img_detail" src="{!! asset('resources/uploads/detail/'.$item['image']) !!}" idHinh="{!! $item['id'] !!}" id="{!! $key !!}">
                            <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                        </div>
                        @endforeach
                        <div class="form">
                            <form>
                                <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                                <div id="insert"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tên menu</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtmenu" class="form-control" placeholder="Menu" value="{!! old('txtmenu',isset($menu) ? $menu['tensp'] : null) !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Loại menu</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="sltDanhmuc">
                            <option value="">Chọn menu</option>
                            <?php danhmucid($danhmuc,0," ",$menu["danhmuc_id"]); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="txtmota">{!! old('txtmota',isset($menu) ? $menu['mota'] : null) !!}</textarea>
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
        </div>
    </form>
</div><!-- col-lg-12-->
<!--main content end-->
@endsection()

