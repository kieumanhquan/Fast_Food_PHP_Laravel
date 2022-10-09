<table class="table table-striped table-advance table-hover">
    <h4> Bảng Thực Đơn</h4>
    <hr>
    <thead>
    <tr>
        <th><i class="fa fa-bullhorn"></i> STT</th>
        <th class="hidden-phone"><i class="fa li_calendar"></i> Menu</th>
        <th><i class="fa li_note"></i> Menu Note</th>
        <th><i class="fa  li_data"></i> Số lượng</th>
        <th><i class="fa li_banknote"></i> Giá Old</th>
        <th><i class="fa li_banknote"></i> Giá New</th>
        <th><i class=" fa li_clip"></i> Menu Boss</th>
        <th><i class=" fa li_calendar"></i> Thời gian</th>
        <th><a class="btn btn-success btn-sm pull-left" href="{!! route('themmenu') !!}">Add New</a></th>
    </tr>
    </thead>
    <tbody>
    <?php $stt = 0 ?>
    @foreach($data as $item)
        <?php $stt= $stt+1 ?>
        <tr>
            <td>{!! $stt !!}</td>
            <td class="hidden-phone">{!! $item["tensp"] !!}</td>
            <td class="hidden-phone">{!! $item["mota"] !!}</td>
            <td class="hidden-phone">{!! $item["soluong"] !!}</td>
            <td class="hidden-phone">{!! number_format($item["giaold"]) !!}.VNĐ</td>
            <td class="hidden-phone">{!! number_format($item["gianew"]) !!}.VNĐ</td>
            <td class="hidden-phone"><span class="label label-warning label-mini">{{ $item->tendanhmuc }}</span></td>
            <td>
                {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
            </td>
            <td>
                <a class="btn btn-success btn-xs fa fa-check"></a>
                {{--Thêm--}}
                <a class="btn btn-primary btn-xs fa fa-pencil" onclick="return xacnhanxoa('Chắc chắn sửa')" href="{!! URL::route('suamenu',$item['id']) !!}"></a>
                {{--Xoá--}}
                <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href="{!! URL::route('xoamenu',$item['id']) !!}"></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $data->render() }}
