@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('main')
<link rel="stylesheet" href="css/cart.css">	
<script type="text/javascript">
	function updateCart(qty,rowId){
		$.get( 
			'{{asset('cart/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
		);
	}
</script>
<div id="wrap-inner">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		@if(Cart::count()>=1)
		<form>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@foreach($items as $item)
				<tr>
					<td><img class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$item->options->img)}}"></td>
					<td>{{$item->name}}</td>
					<td>
						<div class="form-group">
						<input class="form-control" type="number" name="quantity" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">
						</div>
					</td>
					<td><span name="price" class="price">{{number_format($item->price,0,',','.')}} đ</span></td>
					<td><span class="price">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>
					<td><a href="{{asset('cart/delete/'.$item->rowId)}}">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
				Tổng thanh toán: <span class="total-price">{{$total}}</span>																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">				
					<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>          	                	
		<div id="xac-nhan">
			<h3>Xác nhận mua hàng</h3>
			<form method="post">
				@csrf

				<div class="form-group">
					<label for="email">Email address:</label>
					<input disabled required type="email" class="form-control" id="email" name="email" placeholder="{{Auth::user()->email}}">
				</div>
				<div class="form-group">
					<label for="name">Người nhận hàng:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="phone">Số điện thoại:</label>
					<input required type="number" class="form-control" id="phone" name="phone">
				</div>
				<div class="form-group">
					<label for="add">Địa chỉ:</label>
					<input required type="text" class="form-control" id="add" name="add">
				</div>
				<div class="form-group">
					<label for="phone">Phương thức thanh toán:</label>
					<select required name="pttt" class="form-control">
						<option>Trực tiếp khi giao hàng</option>
						<option>Chuyển khoản qua ngân hàng</option>
					</select>
				</div>					

				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
				</div>
			</form>
		</div>
		@else
			<h2>Giỏ hàng rỗng</h2>
		@endif
	</div>
</div>
@stop
				