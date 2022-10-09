@extends('TiTa.master')
@section('content')
@section('acction','')
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="row mtbox">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <span class="li_heart"></span>
                            <h3>{{ count($alldm) }}</h3>
                        </div>
                        <p>Tổng danh mục !</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_cloud"></span>
                            <h3>{{ count($allmenu) }}</h3>
                        </div>
                        <p>Tổng thực đơn !</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_stack"></span>
                            <h3>{{ count($alldh) }}</h3>
                        </div>
                        <p>Tổng đơn hàng !</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_news"></span>
                            <h3>{{ count($allgiamgia) }}</h3>
                        </div>
                        <p>Tổng giảm giá !</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_data"></span>
                            <h3>{{ count($allkhohang) }}</h3>
                        </div>
                        <p>Tổng kho hàng !</p>
                    </div>

                </div><!-- /row mt -->

            </div><!-- /col-lg-9 END SECTION MIDDLE -->

            <div class="col-lg-3 ds">
                <div class="desc">
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div><!-- / calendar -->

                </div><!-- /col-lg-3 -->
            </div><! --/row -->

@endsection()
