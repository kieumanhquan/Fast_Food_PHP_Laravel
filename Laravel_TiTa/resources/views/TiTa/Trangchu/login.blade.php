<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TITA - ADMIN</title>

	<!-- Bootstrap core CSS -->
	<link href="{{url('TiTa/assets/css/bootstrap.css')}}" rel="stylesheet">
	<!--external css-->
	<link href="{{url('TiTa/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="{{url('TiTa/assets/css/style.css')}}" rel="stylesheet">
	<link href="{{url('TiTa/assets/css/style-responsive.css')}}" rel="stylesheet">
</head>

<body>
<div id="login-page">
<div class="container">
	  <form class="form-login" action="" method="POST">
		  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<h2 class="form-login-heading">sign in now</h2>
		<div class="login-wrap">
			<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="User ID" >
			@if($errors->has('email'))
				<p style="color: red">{{$errors->first('email')}}</p>
			@endif
			<br>
			<input type="password" name="password" class="form-control" placeholder="Password">
			@if($errors->has('password'))
				<p style="color: red">{{$errors->first('password')}}</p>
			@endif
			<label class="">

			</label>
			{{ csrf_field() }}
			<button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
			<hr>

			<div class="login-social-link centered">
			<p>or you can sign in via your social network</p>
			</div>
		</div>

		  <!-- Modal -->
		  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						  <h4 class="modal-title">Forgot Password ?</h4>
					  </div>
					  <div class="modal-body">
						  <p>Enter your e-mail address below to reset your password.</p>
						  <input type="text"  placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

					  </div>

					  <div class="modal-footer">
						  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						  <button class="btn btn-theme" type="button">Submit</button>
					  </div>
				  </div>
			  </div>
		  </div>
	  </form>
</div>
</div>

<script src="{{url('TiTa/assets/js/jquery.js')}}"></script>
<script src="{{url('TiTa/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('TiTa/assets/js/jquery.backstretch.min.js')}}"></script>
<script>
    $.backstretch("{{url('TiTa/assets/img/huhu.jpg')}}", {speed: 500});
</script>


</body>
</html>
