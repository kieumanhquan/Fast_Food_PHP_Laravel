@extends('Hambuger.master')
@section('trangchu')
  <!-- checkout -->

      <div class="checkout">
        @foreach ($donhang as $item)
        <form action="" method="post" class="beta-form-checkout">
            @if ($item->tongtien == 0)
              <h2>Đơn Hàng Trống !!</h2>
            @else
    		<div class="container">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h2>Mã đơn hàng của bạn: <span>{{ $item->id }}</span></h2>
    			<div class="checkout-right">
    				<table class="timetable_sub">
    					<thead>
    						<tr>
    							<th>SL No.</th>
    							<th>Product</th>
    							<th>Quality</th>
    							<th>Product Name</th>
    							<th>Price</th>
    							<th>Remove</th>
    						</tr>
    					</thead>
              @foreach($chitietdh as $iterm)
    					<tr class="rem1">
    						<td class="invert">1</td>
    						<td class="invert-image"><a><img src="resources/uploads/detail/{{$iterm->image}}" alt=" " class="img-responsive" /></a></td>
    						<td class="invert">
    							 <div class="quantity">
    								<div class="quantity-select">
    									<div class="entry value"><span>{{ $iterm->soluong }}</span></div>
    								</div>
    							</div>
    						</td>
    						<td class="invert">{{ $iterm->tensp }}</td>

    						<td class="invert">{{ number_format($iterm->gianew)}} .VNĐ</td>
    						<td class="invert">
    							<div class="rem">
                    <a class="btn button-close"  onclick="return xacnhanxoa('Chắc chắn xoá')" href='Hambuger/deldh/{{ $iterm->id }}'><i class="fa fa-trash"></i></a>
    							</div>
    						</td>
    					</tr>
              @endforeach
    				</table>
    			</div>

          <div class="checkout-left">

              <div class="checkout-left-basket">

    					<h4>Thông Tin Khách Hàng</h4>
    					<ul>
    						<li>Họ Tên <i>-</i> <span> {{ $item->hoten }} </span></li>
    						<li>Email <i>-</i> <span>{{ $item->email }} </span></li>
    						<li>SĐT <i>-</i> <span>0{{ $item->sdt }} </span></li>
    						<li>Địa Chỉ <i>-</i> <span>{{ $item->diachi }}
                -Quận : <?php
                  $danhmuccha=DB::table('maps')->where('id',$item["maps_id"])->first();
                  echo $danhmuccha->maps;
                  ?>
                 </span></li>
    						<li>Tổng Tiền <i>-</i> <span>{{ number_format($item->tongtien)}}.VNĐ</span></li>
                <h4>Ghi Chú</h4>

                    <li>Gà Quay Tiêu <i>-</i> <span> Thêm Cơm </span></li>
                    <li>Gà Quay Tiêu <i>-</i> <span> Không Cay </span></li>

    					</ul>

              </div>
    				</div>
    				<div class="checkout-right-basket">
    					<a href="http://localhost:8000/Hambuger"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Quay Về</a>
    				</div>
    				<div class="clearfix"> </div>
    			</div>
    		</div>
            @endif
        @endforeach
        </form>
    	</div>





  <!-- //checkout -->
@endsection
