@extends('TiTa.master')
@section('content')
@section('acction','Detail Order')
<div class="row">
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Chi tiết đơn hàng</h4>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa li_news"></i> Menu</th>
                    <th><i class="fa li_data"></i> Số Lượng</th>
                    <th><i class="fa li_banknote"></i> Giá Tiền</th>
                    <th><i class="fa li_clock "></i> Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dh_cart as $item)
                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td><span class="label label-warning label-mini">
                                <?php
                                $danhmuccha=DB::table('menu')->where('id',$item["menu_id"])->first();
                                echo $danhmuccha->tensp;
                                ?>
                            </span>
                        </td>
                        <td class="hidden-phone">{{ $item->soluong }}</td>
                        <td>{{ number_format($item->tongtien) }}.VNĐ</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><! --/content-panel -->
    </div><!-- /col-md-12 -->

    <div class="col-md-12 mt">
        <div class="content-panel">
            <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i> Chi tiết lựa chọn</h4>
                <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa li_news"></i> Menu</th>
                    <th><i class="fa li_note"></i> Lựa chọn</th>

                    <th><i class="fa li_clock "></i> Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($donhang as $key)
                @foreach( $chitiet as $item)
                  @if ($key["luachon_id"] == $item["luachon_id"])
                    <tr>
                        <td>{{ $item->luachon_id }}</td>
                        <td><span class="label label-warning label-mini">
                          <?php
                            $danhmuccha=DB::table('menu')->where('id',$item["menu_id"])->first();
                            echo $danhmuccha->tensp;
                            ?>
                            </span>
                        </td>
                        <td>{{ $item->tentuychon }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() }}</td>
                    </tr>
                  @else

                  @endif
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div><! --/content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- row -->

<div id="morris">
    <div class="row mt">
        <div class="col-lg-6">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Nhân Viên</h4>
                <div class="panel-body">
                    <div id="hero-graph" class="graph">
                        <table class="table table-hover">
                            <hr>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Chức Vụ</th>
                            </tr>
                            </thead>
                                <tbody>
                                @foreach( $dckh as $item)
                                <tr>
                                    <td><span class="label label-warning label-mini">{{ $item->name }}</span></td>
                                    <td>{{ $item->sdt }}</td>
                                    <td>
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
                                    <td></td>
                                    <td><span class="label label-info label-mini"></span></td>
                                    <td></td>
                                </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Người Mua </h4>
                <div class="panel-body">
                    <div id="hero-bar" class="graph">
                        <table class="table table-hover">
                            <hr>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Maps</th>
                                <th>Maps_ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dckh as $item)
                            <tr>
                                <td><span class="label label-warning label-mini">{{ $item->hoten }}</span></td>
                                <td>{{ $item->diachi }}</td>
                                <td>
                                    <span class="label label-success label-mini">
                                        <?php
                                        $maps=DB::table('maps')->where('id',$item["maps_id"])->first();
                                        echo $maps->maps;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
