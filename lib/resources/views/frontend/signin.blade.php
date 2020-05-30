<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="{{asset('public/layout/frontend')}}/">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CườngMobile Shop - @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/signup.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull    = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
					<a href="{{asset('/')}}"><img src="img/home/logo.png"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
          <form class="navbar-form" role="search" method="get" action="{{asset('search/')}}">
						<div class="input-group">
							<div id="search input">
								<input type="text" class="form-control" placeholder="Search" name="result">
							</div>
							<div id="search input" style="margin-top: 29px;">
								 <button class="btn btn-default" input type="submit"><i class="fa fa-search"></i></button>
							</div>
							<div id=login>
								<P>
									<span>Xin chào:</span>
									<a href="{{asset('signin')}}" class="btn-login">Đăng nhập</a>
								</P>
								<P>
									<a href="{{asset('signup')}}" class="btn-login" >Đăng ký</a>
								</P>
							</div>
						</div>
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>		
				</div>		    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
  <!-- endheader -->
  <div id='user'>
    <div class="container">
      <h3><div class="panel-heading">Đăng nhập</div></h3>
				<div class="panel-body">
					<form role="form" method="POST">
						@csrf
						<fieldset>
							@include('errors.note')
							<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{old('email')}}">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tôi
								</label>
							</div>
							<input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary">
						</fieldset>
					</form>
				</div>
			</div>
    </div>
    
    <div class="bottom-container">
      <div class="row">
        <div class="col">
          <a href="{{asset('signup')}}" style="color:white" class="btn">Đăng ký</a>
        </div>
        <div class="col">
          <a href="#" style="color:white" class="btn">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>  
<!-- footer -->
<footer id="footer">			
  <div id="footer-t">
    <div class="container">
      <div class="row">				
        <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
          <a href="{{asset('/')}}"><img src="img/home/logo.png"></a>		
        </div>
        <div id="about" class="col-md-3 col-sm-12 col-xs-12">
          <h3>About us</h3>
          <p class="text-justify">Cuong Academy thành lập năm 2020. </p>
        </div>
        <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
          <h3>Hotline</h3>
          <p>Phone Sale: 0326896628</p>
          <p>Email: mcuong215@gmail.com</p>
        </div>
        <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
          <h3>Contact Us</h3>
          <p>Address 1: 54 Đường 12D - p.Long Thạnh Mỹ - Q.9 - TP.HCM</p>
          <p>Address 2: 21 Lê Văn Việt - p.Tăng Nhơn Phú A - Q9 - TP.HCM</p>
        </div>
      </div>				
    </div>
    <div id="footer-b">				
      <div class="container">
        <div class="row">
          <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
            <p>Học viện Công nghệ CuongPro</p>
          </div>
          <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
            <p>© 2020 Cuongpro Academy. All Rights Reserved</p>
          </div>
        </div>
      </div>
      <div id="scroll">
        <a href="{{asset('/')}}"><img src="img/home/scroll.png"></a>
      </div>	
    </div>
  </div>
</footer>
<!-- endfooter -->
</body>
</html>