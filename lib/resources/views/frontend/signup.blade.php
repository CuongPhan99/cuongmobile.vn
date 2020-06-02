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
  <form role="form" method="post" autocomplete="off">
    @csrf
    <div class="container">
      <h1>Đăng ký</h1>
      <p>Vui lòng điền vào mẫu này để tạo một tài khoản.</p>
      @include('errors.note')
      <hr>

        
      <label for="name"><b>Họ Tên</b></label>
      <input type="text" placeholder="Enter Name" name="name" id="name" required>
      
      <label for="sex"><b>Giới tính</b></label>
        <select required name="sex" class="form-control" >
            <option>Nam</option>
            <option>Nữ</option>
        </select>

      <label for="phone"><b>SĐT</b></label>
      <input type="text" placeholder="Enter Phone" name="phone" id="phone" required>

      <label for="address"><b>Địa chỉ</b></label>
      <input type="text" placeholder="Enter Address" name="address" id="address" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>
  
      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="psw" required>
  
      <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
      <input type="password" placeholder="Repeat Password" name="passwordAgain" id="pswrepeat" required>
      <hr>
  
      <p>Bằng cách tạo một tài khoản, bạn đồng ý với <a href="#">Điều khoản & Quyền riêng tư</a> của chúng tôi .</p>
      <button type="submit" name="submit" class="registerbtn">Đăng ký</button>
    </div>
  
    <div class="container signin">
      <p>Bạn đã có sẵn một tài khoản?<a href="#">Đăng nhập</a>.</p>
    </div>
  </form>
<!-- footer -->
<footer id="footer">			
  <div id="footer-t">
    <div class="container">
      <div class="row">				
        <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
          <a href="{{asset('/')}}"><img src="img/home/logo.png"></a>		
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
  
          <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
            <p>© 2020 Copyright CuongMobile.vn </p>
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