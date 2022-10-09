<!DOCTYPE html>
<html>
<head>
<title>TiTa</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- //for-mobile-apps -->
<base href="{{ asset('') }}">
<link href="TrangChu/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="TrangChu/css/font-awesome.min.css">
<link href="TrangChu/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="TrangChu/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="TrangChu/js/jquery-1.11.1.min.js"></script>
<!-- //js -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="TrangChu/js/move-top.js"></script>
<script type="text/javascript" src="TrangChu/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
			<li>
				<img src="images/13.png" alt="" width="50px" height="50px" />
			</li>
			</div>
			<div class="agile-login">
				<ul>
					<li>
						<a href="http://localhost:8000/Hambuger"> Chọn Tỉnh/Thành Phố </a>
					</li>
					<li><a href="http://localhost:8000/Hambuger">Trợ Giúp</a></li>

				</ul>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-bomb" aria-hidden="true"></i> Vị ngon trên từng ngón tay</li>

				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="http://localhost:8000/Hambuger">Buger TiTa</a></h1>
			</div>
		<div class="w3l_search">
      <div class="beta-comp">
    @if(Session::has('cart'))
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
                @foreach($product_cart as $product)
            <div class="cart-item">
                <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
                <div class="media">
                    <a class="pull-left" href="#"><img src="resources/uploads/detail/{{ $product['item']['image'] }}" width="50px" height="50px" alt=""></a>
                    <div class="media-body">
                        <span class="cart-item-title">{{ $product['item']['tensp'] }}</span>
                        <span class="cart-item-amount">{{ $product['qty'] }}*<span>@if($product['item']['gianew']==0){{number_format($product['item']['giaold'])}} @else {{number_format($product['item']['gianew'])}} .VNĐ @endif</span></span>
                    </div>
                </div>
            </div>
                @endforeach
            <div class="cart-caption">
                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{ number_format($totalPrice) }} @else 0 @endif .VNĐ</span></div>
                <div class="clearfix"></div>

                <div class="center">
                    <div class="space10">&nbsp;</div>
                    @if($totalPrice < 80000)
                      <a>Tổng giá tiền phải lớn hơn 80.000 VNĐ</a>
                    @else
                     <a href="{{ route('dathang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                   @endif
                </div>
            </div>

        </div>
    </div> <!-- .cart -->
    @endif
</div>
		</div>

			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="http://localhost:8000/Hambuger" class="act">Giới thiệu</a></li>
									<!-- Mega Menu -->
									<li><a href="http://localhost:8000/Hambuger/loai/1">Thực Đơn</a></li>
									<li><a href="http://localhost:8000/Hambuger">Nhà hàng</a></li>
									<li><a href="http://localhost:8000/Hambuger">Khuyến mãi</a></li>
									<li><a href="http://localhost:8000/Hambuger">Nghề nghiệp</a></li>
									<li><a href="http://localhost:8000/Hambuger">Thư viện ảnh</a></li>
									<li><a href="http://localhost:8000/Hambuger">Thành viên</a></li>
									<li>
									</li>
								</ul>
							</div>

							</nav>
			</div>
		</div>

<!-- //navigation -->
	<!-- main-slider -->
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
@yield('trangchu')
<!--banner-bottom-->
<!--brands-->
	<div class="brands">
		<div class="container">
		<h3>MENU</h3>
			<div class="brands-agile">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">COMBO</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">CHICKEN</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">BUGER</a></p>
					</div>
				</div>

				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">FOOD</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">DESSERT</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">DRINKS</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!--//brands-->

<!-- //footer -->
<div class="footer">
		<div class="container">

		</div>

		<div class="footer-copy">

			<div class="container">

				<p> Copyright © 2017 BUGER Việt Nam <a href="#">BUGER</a></p>
			</div>
		</div>

	</div>
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="TrangChu/js/bootstrap.min.js"></script>
	<script src="TrangChu/js/jquery.js"></script>
	<script src="TrangChu/js/test.js"></script>

	<script src="TrangChu/js/jquery.colorbox-min.js"></script>

	<script src="TrangChu/js/dug.js"></script>
	<script src="TrangChu/js/scripts.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->

<!-- main slider-banner -->
<script src="TrangChu/js/skdslider.min.js"></script>
<link href="TrangChu/css/skdslider.css" rel="stylesheet">


<!-- //main slider-banner -->
</body>
</html>
