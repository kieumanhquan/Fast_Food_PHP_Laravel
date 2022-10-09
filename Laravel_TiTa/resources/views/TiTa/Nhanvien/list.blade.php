<?php $stt = 0 ?>
@foreach($nvien as $item)
    <?php $stt= $stt+1 ?>
    <tr>
        <td>{!! $stt !!}</td>
        <td class="hidden-phone">{!! $item["name"] !!}</td>
        <td class="hidden-phone">
            <span class="label label-warning label-mini">
                @if($item["chucvu"]== 1)
                    {!! "CEO" !!}
                @else
                    @if($item["chucvu"]== 2)
                        {!! "Quản lý" !!}
                    @else
                        @if($item["chucvu"]==3)
                            {!! "Thu ngân" !!}
                        @else
                            @if($item["chucvu"]==4)
                                {!! "Kho hàng" !!}
                            @else
                                @if($item["chucvu"]==5)
                                    {!! "Giao hàng" !!}
                                @endif
                            @endif
                        @endif
                    @endif
                @endif
            </span>
        </td>
        <td class="hidden-phone">{!! $item["sdt"] !!}</td>
        <td>
            {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
        </td>
        <td>
            <a class="btn btn-success btn-xs fa fa-check"></a>
            {{--Thêm--}}
            <a class="btn btn-primary btn-xs fa fa-pencil" onclick="return xacnhanxoa('Chắc chắn sửa')" href="{!! URL::route('suanhanvien',$item['id']) !!}"></a>
            {{--Xoá--}}
            <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href="#"></a>
        </td>
        <td>

        </td>
    </tr>
@endforeach
