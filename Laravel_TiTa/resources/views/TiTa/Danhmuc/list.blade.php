@extends('TiTa.master')
@section('content')
@section('acction','Danh Mục')
<div class="row mt">
  <div class="col-md-12">
      <div class="content-panel">
          <table class="table table-striped table-advance table-hover" id="dataTables-example">
              <h4><i class="fa fa-angle-right"></i> Bảng Danh Mục</h4>
              <hr>
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i> STT</th>
                  <th class="hidden-phone"><i class="fa li_note"></i> Menu</th>
                  <th><i class="fa fa-bookmark"></i> Menu Boss</th>
                  <th><i class=" fa li_calendar"></i> Thời gian</th>
                  <th><a class="btn btn-success btn-sm pull-left" href="{!! route('themdanhmuc') !!}">Add New</a></th>
              </tr>
              </thead>
              <tbody>
              <?php $stt = 0 ?>
              @foreach($data as $item)
                  <?php $stt= $stt+1 ?>
              <tr>
                  <td>{!! $stt !!}</td>
                  <td class="hidden-phone">{!! $item["tendanhmuc"] !!}</td>
                  <td><span class="label label-warning label-mini">
                      @if($item["danhmuccha_id"]== 0)
                          {!! "None" !!}
                      @else
                          <?php
                          $danhmuccha=DB::table('danhmuc')->where('id',$item["danhmuccha_id"])->first();
                          echo $danhmuccha->tendanhmuc;
                          ?>
                      @endif
                  </span></td>
                  <td>
                      {!! date('Y-m-d',strtotime($item["created_at"])) !!}
                  </td>
                  <td>
                      <a class="btn btn-success btn-xs fa fa-check"></a>
                      {{--Thêm--}}
                      <a class="btn btn-primary btn-xs fa fa-pencil" onclick="return xacnhanxoa('Chắc chắn sửa')" href="{!! URL::route('suadanhmuc',$item['id']) !!}"></a>
                      {{--Xoá--}}
                      <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href="{!! URL::route('xoadanhmuc',$item['id']) !!}"></a>

                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>{!! $trang->render() !!}
      </div><!-- /content-panel -->
  </div><!-- /col-md-12 -->
</div><!-- /row -->
<script type="text/javascript">
    $s()
</script>
@endsection()
