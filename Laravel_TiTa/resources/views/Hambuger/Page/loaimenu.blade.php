@extends('Hambuger.master')
@section('trangchu')
  <div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
            @foreach($danhmuc as $item)
						<li><a href="{{ route('loaimenu',$item->id) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$item->tendanhmuc}}</a></li>
            @endforeach
          </ul>
				</div>
			</div>
			<div class="col-md-8 products-right">

        <div class="agile_top_brands_grids">
          @foreach ($menu_theoloai as $key => $item)
          <div class="col-md-4 top_brand_left">
            <div class="hover14 column">
              <div class="agile_top_brand_left_grid">
                <div class="agile_top_brand_left_grid_pos">
                  @foreach ($sale as $salee)
                    @if($salee["menu_id"] == $item["menu_id"])
                         <div class="ribbon-wrapper"><div class="ribbon sale">{{ $salee->phantram }}%</div></div>
                     @else
                     @endif

                   @endforeach
                   <img src="TrangChu/images/offer.png" alt=" " class="img-responsive" />
                </div>
                <div class="agile_top_brand_left_grid1">
                  <figure>
                    <div class="snipcart-item block" >

                      <div class="snipcart-thumb">

                        <a ><img src="resources/uploads/detail/{{ $item->image }}" width="100px" height="100px"/></a>
                        <p>{{ $item->tensp }}</p>
                        <p>
                            @if($item->giaold > $item->gianew)
                                 <h4>{{ number_format($item->gianew) }}.VNĐ</h4>
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
                              <button type="button" class="btn btn-info btn-lg">Đã hết</button>
                            @endif
                          </fieldset>
                      </div>
                    </div>
                  </figure>
                </div>

              </div>
            </div>
          </div>@endforeach
        </div>

          <div class="clearfix"> </div>
          @foreach ($menu_theoloai as $key => $item)
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
              <div class="topping-item-modal-list-item-container ng-scope" ng-repeat="option in dish.optionlist.Option" style="">

                    <div>
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
          @endforeach
        </div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
@endsection
