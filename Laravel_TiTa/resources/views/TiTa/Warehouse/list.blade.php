@extends('TiTa.master')
@section('content')
@section('acction','Kho hàng')
@include('TiTa.Warehouse.editxl')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover" id="dataTables-example">
                <h4> Kho hàng Table <a class="btn btn-default btn-sm pull-right" target="_self" href="">Loading</a> </h4>
                <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> STT</th>
                    <th class="hidden-phone"><i class="fa li_note"></i> Kho Menu</th>
                    <th><i class="fa li_data"></i> Số lượng</th>
                    <th><i class=" fa li_calendar"></i> Đơn Giá</th>
                    <th><i class=" fa li_banknote"></i> Tổng tiền</th>
                    <th><i class=" fa li_user"></i> User</th>
                    <th><i class=" fa li_calendar"></i> Thời gian</th>
                    <th><i class=" fa li_calendar"></i> Ngày nhập</th>
                    <th><a class="btn btn-success btn-sm pull-left" href="{!! route('themkho') !!}">Add New</a></th>
                </tr>
                </thead>
                <tbody id="stn-info">
                <?php $stt = 0 ?>
                @foreach($data as $item)
                    <?php $stt= $stt+1 ?>
                    <tr>
                        <td>{!! $stt !!}</td>
                        <td class="hidden-phone">{!! $item["sanphamkho"] !!}</td>
                        <td class="hidden-phone">{!! $item["soluong"] !!}</td>
                        <td class="hidden-phone">{!! number_format($item["giasanpham"]) !!}.VNĐ</td>
                        <td class="hidden-phone">{!! number_format($item["tongtienkho"]) !!}.VNĐ</td>
                        <td><span class="label label-warning label-mini">{{ $item->name }}</span></td>
                        <td>
                            {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
                        </td>
                        <td>{!! date('Y-m-d',strtotime($item["created_at"])) !!}</td>
                        <td>
                            <a class="btn btn-success btn-xs fa fa-check"></a>
                            {{--Thêm--}}
                            <a class="btn btn-primary btn-xs fa fa-pencil" id="xuly" data-id="{{ $item->id }}"></a>
                            {{--Xoá--}}
                            <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href="{!! URL::route('xoakho',$item['id']) !!}"></a>

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

        $('body').delegate('#stn-info #xuly','click',function (e) {
            var id = $(this).data('id');
            $.get("{{ URL::to('Admin/khohang/editkho') }}",{id:id},function (data) {
                $('#xuly-update').find('#nhanvien_id').val(data.nhanvien_id)
                $('#xuly-update').find('#sanphamkho').val(data.sanphamkho)
                $('#xuly-update').find('#giasanpham').val(data.giasanpham)
                $('#xuly-update').find('#tongtienkho').val(data.tongtienkho)
                $('#xuly-update').find('#soluong').val(data.soluong)
                $('#xuly-update').find('#id').val(data.id)
                $('#xuly-update').modal('show');
            })
        })

        $('#xuly-update1').on('submit',function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url,data,function (data) {
                console.log(data)
            })
        })

    </script>
@endsection
