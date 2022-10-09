@extends('TiTa.master')
@section('content')
@section('acction','Search Menu')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <form method="GET" id="frmsearch" class="form-horizontal">
                    <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search by ID">
                    <span class="input-group-btn">
                      <div class="col-lg-10">
                          <select class="form-control" name="type">
                            @foreach ($danhmuc as $key => $item)
                              <option value="{{ $key }}">{{ $item}}</option>
                            @endforeach
                          </select>
                      </div>
                    </span>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div  class="panel-body">
<table class="table table-striped table-advance table-hover">
    <hr>
    <thead>
    <tr>
        <th><i class="fa fa-bullhorn"></i> STT</th>
        <th class="hidden-phone"><i class="fa li_calendar"></i> Menu</th>
        <th><i class="fa li_note"></i> Menu Name</th>
        <th><i class="fa  li_data"></i> Số lượng</th>
        <th><i class="fa li_banknote"></i> Giá bán</th>
        <th><i class="fa  li_data"></i> Danh Mục</th>
        <th><i class=" fa li_calendar"></i> Thời gian</th>
        <th><a class="btn btn-success btn-sm pull-left" href="">Add New</a></th>
    </tr>
    </thead>
    <tbody>
    <?php $stt = 0 ?>
    @foreach($data as $key => $item)
        <?php $stt= $stt+1 ?>
        <tr>
            <td>{!! $stt !!}</td>
            <td class="hidden-phone">{{ $item->tensp }}</td>
            <td class="hidden-phone">{!! $item["mota"] !!}</td>
            <td class="hidden-phone">{{ $item->soluong }}</td>
            <td class="hidden-phone">{{ number_format($item->giaold) }}.VNĐ</td>
            <td class="hidden-phone">{{ $item->tendanhmuc }}</td>
            <td>
                {{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() }}
            </td>
            <td>
                <a class="btn btn-success btn-xs fa fa-check"></a>
                {{--Thêm--}}
                <a class="btn btn-primary btn-xs fa fa-pencil" onclick="return xacnhanxoa('Chắc chắn sửa')" href="{!! URL::route('suamenu',$item['id']) !!}"></a>
                {{--Xoá--}}
                <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href=""></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
