@extends('Hambuger.master')
@section('trangchu')
  <!-- checkout -->
  	<div class="checkout">
      <form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
  		<div class="container">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
            @if(Session::has('cart'))
            @foreach($product_cart as $cart)
  					<tr class="rem1">

  						<td class="invert">1</td>
  						<td class="invert-image"><a><img src="resources/uploads/detail/{{$cart['item']['image']}}" alt=" " class="img-responsive" /></a></td>
  						<td class="invert">
  							 <div class="quantity">
  								<div class="quantity-select">
  									<div class="entry value"><span>{{$cart['qty']}}</span></div>

  								</div>
  							</div>
  						</td>
  						<td class="invert">{{$cart['item']['tensp']}}</td>

  						<td class="invert">{{number_format($cart['price'])}} đồng</td>
  						<td class="invert">
  							<div class="rem">
  								<a class="btn edit" data-toggle="modal" data-target="#myModal{{$cart['item']['id']}}"><i class="fa fa-pencil"></i></a>
                  <a class="btn button-close" href="{{route('xoagiohang',$cart['item']['id'])}}"><i class="fa fa-trash"></i></a>
  							</div>
  						</td>
  					</tr>
            @endforeach
            @endif
  				</table>
  			</div>

  			<div class="checkout-left">
  				<div class="checkout-left-basket">
            <div class="your-order-body">
              <h4>Nhập Thông Tin</h4>
              <div class="form-block">
                  <label for="name">Họ tên*</label><br />
                  <input type="text" id="hoten" name="hoten" placeholder="" required><br />
                  <label for="name">SĐT*</label><br />
                  <input type="text" id="sdt" name="sdt" placeholder="" required><br />
                  @if(count($errors)>0)
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <b>Oh snap ! </b> {!! $error !!} .<br>
                          @endforeach
                      </div>
                  @endif
                  <label for="email">Email*</label><br />
                  <input type="email" id="email" name="email" required placeholder="gmail@gmail.com"><br />
                  <label for="adress">Địa chỉ*</label><br />
                  <input type="text" id="adress" name="diachi" placeholder="Street Address" required><br />
                  <label for="phone">Maps*</label><br />
                  <select class="form-control" name="maps">
                    @foreach($map as $key => $spmap)
                        <option value="{{ $key }}">{{ $spmap }}</option>
                    @endforeach
                  </select>
                  <label for="phone">Ghi Chú*</label><br />
                  <input type="text" id="ghichu" name="ghichu" placeholder="(Tầng nhà,...)" required>
              </div>
            </div>
  				</div>
  				<div class="checkout-right-basket">
<div class="your-order-body">
  <ul class="payment_methods methods">
      <li class="payment_method_bacs">
          <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
          <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
          <div class="payment_box payment_method_bacs" style="display: block;">
              Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
          </div>
      </li>

      <li class="payment_method_cheque">
          <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
          <label for="payment_method_cheque">Chuyển khoản </label>
          <div class="payment_box payment_method_cheque" style="display: none;">
              Chuyển tiền đến tài khoản sau:
              <br>- Số tài khoản: 123 456 789
              <br>- Chủ TK: Nguyễn A
              <br>- Ngân hàng VIETINBANK, Chi nhánh TP.Đà Nẵng
          </div>
      </li>

  </ul>
</div>
@if(Session::has('cart'))
  @if ($totalPrice < 80000)
  <div class="your-order-head"><h5>Tổng giá tiền phải lớn hơn 80.000 VNĐ</h5><br/>
      <a href="{{ route('menu') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Hãy đặt các <b>Phần ăn COMBO </b>để giúp bạn tiết kiệm hơn</a>
    </br/>
  </div>
  @else
    <button type="submit" class="glyphicon glyphicon-menu-left" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button>
 @endif
@endif

  				</div>
  				<div class="clearfix"> </div>
  			</div>
  		</div>
      @if(Session::has('cart'))
                @foreach($product_cart as $cart)
                    <div id="myModal{{ $cart['item']['id'] }}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ $cart['item']['tensp'] }}</h4>
                          </div>
                          <div class="modal-body">
                            @foreach ($notea->take(5) as $noteaa)
                            <div class="topping-item-modal-item-name">
                              @if ($cart['item']['id'] == $noteaa["menu_id"])
                                <input type="hidden" name="check1" value="NULL">
                                <input type="checkbox" class="filled-in ng-pristine ng-untouched ng-valid ng-empty" id="checkItem" name="check[]" value="{{ $noteaa->matuychon }}" checked>
                                <label class="ng-binding"><span>{{ $noteaa->tentuychon }}</span></label>
                              @else
                              @endif
                              </div>
                            @endforeach
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

              @endforeach
            @endif
      </form>
  	</div>


  <!-- //checkout -->
@endsection
