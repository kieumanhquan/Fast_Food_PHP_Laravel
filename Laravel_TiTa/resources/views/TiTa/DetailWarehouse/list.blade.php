@extends('TiTa.master')
@section('content')
@section('acction','Detail')
@include('TiTa.DetailWarehouse.add')
@include('TiTa.DetailWarehouse.edit')
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <b>Oh snap ! </b> {!! $error !!} .<br>
        @endforeach
    </div>
@endif
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Chi tiết kho Table</h4>
                <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> STT</th>
                    <th class="hidden-phone"><i class="fa li_note"></i> Menu</th>
                    <th><i class="fa fa-bookmark"></i> Số lượng</th>
                    <th><i class=" fa li_calendar"></i> Giá nhập</th>
                    <th><i class=" fa li_calendar"></i> Sản phẩm kho</th>
                    <th><i class=" fa li_calendar"></i> Thời gian</th>
                    <th>
                        <a class="btn btn-success btn-sm pull-left" data-toggle="modal" data-target="#myModal" href="">Add New</a>
                        <a class="btn btn-default btn-sm pull-right" target="_self" href="">Loading</a>
                    </th>
                </tr>
                </thead>
                <tbody id="stn-info">
                <?php $stt = 0 ?>
                @foreach($data as $item)
                    <?php $stt= $stt+1 ?>
                    <tr id="{{ $item->id }}">
                        <td>{!! $stt !!}</td>
                        <td>{{ $item->tensp }}</td>
                        <td class="hidden-phone">{{ $item->soluong }}</td>
                        <td class="hidden-phone">{{ number_format($item->gianhap) }}.VNĐ</td>
                        <td>{{ $item->sanphamkho }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() }}
                        </td>
                        <td>
                            <a class="btn btn-success btn-xs fa fa-check"></a>
                            {{--Thêm--}}
                            <a class="btn btn-primary btn-xs fa fa-pencil" id="edit" data-id="{{ $item->id }}"  href="#"></a>
                            {{--Xoá--}}
                            <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" id="del" data-id="{{ $item->id }}" href="#"></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
@endsection()
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#frm-insert1').on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            var post = $(this).attr('method');
            $.ajax({
                type : post,
                url : url,
                data : data,
                dataTy : 'json',
                success:function (data) {
                    console.log(data)
                }
            })
        });

        $(document).on('click','#del',function (e) {
            var id=$(this).data('id');
            $.post('{{URL::to("Admin/khohang/destroy")}}',{id:id},function (data) {
                $('#stn-info #'+id).remove();
            })
        });

        $('body').delegate('#stn-info #edit','click',function (e) {
            var id = $(this).data('id');
            $.get("{{ URL::to('Admin/khohang/detailedit') }}",{id:id},function (data) {
                $('#frm-update').find('#menu_id').val(data.menu_id)
                $('#frm-update').find('#soluong').val(data.soluong)
                $('#frm-update').find('#gianhap').val(data.gianhap)
                $('#frm-update').find('#khohang_id').val(data.khohang_id)
                $('#frm-update').find('#id').val(data.id)
                $('#update').modal('show');
            })
        })

        $('#frm-update').on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url,data,function (data) {
                console.log(data)
            })
        })
    </script>
@endsection
