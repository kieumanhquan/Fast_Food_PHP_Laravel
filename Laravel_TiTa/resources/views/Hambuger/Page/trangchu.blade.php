@extends('Hambuger.master')
@section('trangchu')
{{----}}
<div class="top-brands">
  <div class="container">
  <h2>THỰC ĐƠN</h2>
    <div class="grid_3 grid_5">
      <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Hot Nhất</a></li>
          <li role="presentation"><a href="http://localhost:8000/Hambuger/loai/1" >Xem Thêm</a></li>
        </ul>

          <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">

            <div class="agile_top_brands_grids">
              @foreach ($menu as $item)
              <div class="col-md-4 top_brand_left">
                <div class="hover14 column">
                  <div class="agile_top_brand_left_grid">
                    <div class="agile_top_brand_left_grid_pos">
                      @if($item->phantram !=0)
                           <div class="ribbon-wrapper"><div class="ribbon sale">{{ $item->phantram }}%</div></div>
                       @else
   												<img src="TrangChu/images/offer.png" alt=" " class="img-responsive" />
                       @endif
                    </div>
                    <div class="agile_top_brand_left_grid1">
                      <figure>
                        <div class="snipcart-item block" >

                          <div class="snipcart-thumb">

                            <a><img src="resources/uploads/detail/{{ $item->image }}" width="200px" height="200px"/></a>
                            <p>{{ $item->tensp }}</p>
                            <p>
                                @if($item->giaold > $item->gianew)
                                     <h4>{{ number_format($item->gianew) }}.VNĐ <span>{{ number_format($item->giaold) }}.VNĐ</span></h4>
                                 @else
                                     <span>{{ number_format($item->gianew) }}.VNĐ</span>
                                 @endif
                            </p>
                          </div>
                          <div class="snipcart-details top_brand_home_details">
                              <fieldset>
                                @if ($item->soluong >=1)

                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{ $item->id }}">Xem</button>
                                @else
                                  <input name="submit" value="                      Hết Rồi" class="button" />
                                @endif
                              </fieldset>
                          </div>
                        </div>
                      </figure>
                    </div>

                  </div>
                </div>

              <div class="clearfix"> </div>
                <div class="modal fade" id="myModal{{ $item->id }}" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ $item->tensp }}</h4>
                      </div>
                      <div class="modal-body">
                      			<div class="agileinfo_single">

                      				<div class="col-md-4 agileinfo_single_left">
                      					<img id="example" src="resources/uploads/detail/{{ $item->image }}" alt=" " class="img-responsive">
                      				</div>
                      				<div class="col-md-8 agileinfo_single_right">

                      					<div class="w3agile_description">
                      						<h4>Description :</h4>
                      						<p>{!! $item["mota"] !!}.</p>
                      					</div>
                      					<div class="snipcart-item block">
                      						<div class="snipcart-thumb agileinfo_single_right_snipcart">
                                    <p>
                                        @if($item->giaold > $item->gianew)
                                             <h4>{{ number_format($item->gianew) }}.VNĐ <span>{{ number_format($item->giaold) }}.VNĐ</span></h4>
                                         @else
                                             <span>{{ number_format($item->gianew) }}.VNĐ</span>
                                         @endif
                                    </p>
                      						</div>
                      						<div class="snipcart-details agileinfo_single_right_details">
                      							<form action="#" method="post">
                      								<fieldset>
                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                      								</fieldset>
                      							</form>
                      						</div>
                      					</div>
                      				<div class="clearfix"> </div>
                      		</div>
                      	</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
          </div>@endforeach
      </div>
  </div>
</div>
<!-- //top-brands -->
<!-- Carousel
  ================================================== -->

<!--banner-bottom-->
      <div class="ban-bottom-w3l">
        <div class="container">
        <div class="col-md-6 ban-bottom3">
            <div class="ban-top">
              <img src="TrangChu/images/p2.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="ban-img">
              <div class=" ban-bottom1">
                <div class="ban-top">
                  <img src="TrangChu/images/p3.jpg" class="img-responsive" alt=""/>

                </div>
              </div>
              <div class="ban-bottom2">
                <div class="ban-top">
                  <img src="TrangChu/images/p4.jpg" class="img-responsive" alt=""/>

                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-6 ban-bottom">
            <div class="ban-top">
              <img src="TrangChu/images/111.jpg" class="img-responsive" alt=""/>


            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>

@endsection
