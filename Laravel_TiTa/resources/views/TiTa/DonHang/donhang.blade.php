@extends('TiTa.master')
@section('content')
@section('acction','Đơn Hàng')
@include('TiTa.DonHang.edit')
@include('TiTa.DonHang.editxl')
<div class="row mt">
<div class="col-md-12">
    <a class="btn btn-default btn-sm pull-right" target="_self" href="">Loading</a>
<div class="tab-wrap">
    <input type="radio" id="tab1" name="tabGroup1" class="tab" checked>
        <label for="tab1">Đơn hàng</label>
    <input type="radio" id="tab2" name="tabGroup1" class="tab">
        <label for="tab2">Đã Giao</label>
    <input type="radio" id="tab3" name="tabGroup1" class="tab">
        <label for="tab3">Lịch sử</label>
    <div class="tab-content">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> STT</th>
                        <th class="hidden-phone"><i class="fa li_user"></i> ID_Clients</th>
                        <th><i class="fa li_banknote "></i> Money</th>
                        <th><i class="fa li_note"></i> Ghi chú</th>
                        <th><i class=" fa li_truck"></i> Tình trạng</th>
                        <th><i class="fa li_calendar"></i> Thời gian</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="stn-info">
                    <?php $stt =0 ?>
                            @foreach($donhang as $item)
                        <?php $stt=$stt+1 ?>
                        <tr>
                            <td>{!! $stt !!}</td>
                            <td class="hidden-phone">MDC0{{ $item->diachikh_id }}</td>
                            <td>{{ number_format($item->tongtien) }}.VNĐ</td>
                            <td>{{ $item->ghichu }}</td>
                            <td>
                                @if($item["tinhtrang"]== 1)
                                    <span class="label label-warning label-mini">{!! "Chưa giao" !!}</span>
                                    @else
                                        @if($item["tinhtrang"]== 2)
                                        <span class="label label-success label-mini">{!! "Đã giao" !!}</span>
                                        @else
                                            @if($item["tinhtrang"]==3)
                                            <span class="label label-info label-mini">{!! "Huỷ" !!}</span>
                                            @endif
                                        @endif
                                    @endif
                            </td>
                            <td>
                            {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            <td>
                                <a class="btn btn-warning btn-xs fa fa-search-minus" id="getedit" data-id="{{ $item->id }}"></a>

                                <a class="btn btn-success btn-xs fa fa-check" id="xuly" data-id="{{ $item->id }}"></a>

                                <a class="btn btn-primary btn-xs fa fa-cog"  href="{!! URL::route('xulycart',$item['id']) !!}"></a>
                                {{--Xoá--}}
                                <a class="btn btn-danger btn-xs fa fa-clipboard" target="_blank" href="{!! URL::route('pdf',$item['id']) !!}"></a>

                            </td>
                        </tr>
                                @endforeach
                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div>
    <div class="tab-content">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> STT</th>
                                <th class="hidden-phone"><i class="fa li_user"></i> ID_Clients</th>
                                <th><i class="fa li_banknote "></i> Money</th>
                                <th><i class="fa li_note"></i> Ghi chú</th>
                                <th><i class=" fa li_truck"></i> Tình trạng</th>
                                <th><i class="fa li_calendar"></i> Thời gian</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="stn-info">
                            <?php $stt =0 ?>
                            @foreach($ctdh as $item)
                                <?php $stt=$stt+1 ?>
                                <tr>
                                    <td>{!! $stt !!}</td>
                                    <td class="hidden-phone">MDH0{{ $item->diachikh_id }}</td>
                                    <td>{{ number_format($item->tongtien) }}.VNĐ</td>
                                    <td>{{ $item->ghichu }}</td>
                                    <td>
                                        @if($item["tinhtrang"]== 1)
                                            <span class="label label-warning label-mini">{!! "Chưa giao" !!}</span>
                                        @else
                                            @if($item["tinhtrang"]== 2)
                                                <span class="label label-success label-mini">{!! "Đã giao" !!}</span>
                                            @else
                                                @if($item["tinhtrang"]==3)
                                                    <span class="label label-info label-mini">{!! "Huỷ" !!}</span>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-xs fa fa-check" id="xuly" data-id="{{ $item->id }}"></a>
                                        {{--Thêm--}}
                                        <a class="btn btn-primary btn-xs fa fa-cog" href="{!! URL::route('xulycart',$item['id']) !!}"></a>
                                        {{--Xoá--}}
                                        <a class="btn btn-danger btn-xs fa fa-trash-o" onclick="return xacnhanxoa('Chắc chắn xoá')" href=""></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->
    </div>
    <div class="tab-content">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th class="numeric">STT</th>
                                <th class="numeric">ID Cart</th>
                                <th class="numeric">Employees</th>
                                <th class="numeric">Position</th>
                                <th class="numeric">Customer</th>
                                <th class="numeric">Phone Customer</th>
                                <th class="numeric">Total money</th>
                                <th class="numeric">Status</th>
                                <th class="numeric">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt =0 ?>
                            @foreach($alldh as $item)
                                <?php $stt=$stt+1 ?>
                                <tr>
                                    <td data-title="Code">{!! $stt !!}</td>
                                    <td data-title="Code">MDH0{{ $item->id }}</td>
                                    <td data-title="Company">{{ $item->name }}</td>
                                    <td class="numeric" data-title="Change">
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
                                    </td>
                                    <td class="numeric" data-title="Change">{{ $item->hoten }}</td>
                                    <td class="numeric" data-title="Change">0{{ $item->sdt }}</td>
                                    <td class="numeric" data-title="High">{{ number_format($item->tongtien) }}.VNĐ</td>
                                    <td class="numeric" data-title="Open">
                                        @if($item["tinhtrang"]== 1)
                                            {!! "Chưa giao" !!}
                                        @else
                                            @if($item["tinhtrang"]== 2)
                                                {!! "Đã giao" !!}
                                            @else
                                                @if($item["tinhtrang"]==3)
                                                    {!! "Huỷ" !!}
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td class="numeric" data-title="High">
                                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->
    </div>
</div>
</div>
</div>
{{--<script type="text/javascript">--}}
    {{--var theToggle = document.getElementById('toggle');--}}
    {{--// hasClass--}}
    {{--function hasClass(elem, className) {--}}
        {{--return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');--}}
    {{--}--}}
    {{--// toggleClass--}}
    {{--function toggleClass(elem, className) {--}}
        {{--var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';--}}
        {{--if (hasClass(elem, className)) {--}}
            {{--while (newClass.indexOf(" " + className + " ") >= 0 ) {--}}
                {{--newClass = newClass.replace( " " + className + " " , " " );--}}
            {{--}--}}
            {{--elem.className = newClass.replace(/^\s+|\s+$/g, '');--}}
        {{--} else {--}}
            {{--elem.className += ' ' + className;--}}
        {{--}--}}
    {{--}--}}
    {{--theToggle.onclick = function() {--}}
        {{--toggleClass(this, 'on');--}}
        {{--return false;--}}
    {{--}--}}
{{--</script>--}}
<script src="{{url('TiTa/assets/js/jquery.js')}}"></script>
@endsection()
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').delegate('#stn-info #getedit','click',function (e) {
            var id = $(this).data('id');
            $.get("{{ URL::to('Admin/donhang/ttkh') }}",{id:id},function (data) {
                $('#frm-update').find('#sdt').val(data.sdt)
                $('#frm-update').find('#hoten').val(data.hoten)
                $('#frm-update').find('#diachi').val(data.diachi)
                $('#frm-update').find('#email').val(data.email)
                $('#frm-update').find('#id').val(data.id)
                $('#update').modal('show');
            })
        })


        $('body').delegate('#stn-info #xuly','click',function (e) {
            var id = $(this).data('id');
            $.get("{{ URL::to('Admin/donhang/xuly') }}",{id:id},function (data) {
                $('#xuly-update').find('#nhanvien_id').val(data.nhanvien_id)
                $('#xuly-update').find('#diachikh_id').val(data.diachikh_id)
                $('#xuly-update').find('#tinhtrang').val(data.tinhtrang)
                $('#xuly-update').find('#tongtien').val(data.tongtien)
                $('#xuly-update').find('#ghichu').val(data.ghichu)
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
