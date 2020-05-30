@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($featured as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail">
				<p><a>{{$item->prod_name}}</a></p>
				<span class="price"> {{number_format($item->prod_price,0,',','.')}} đ</span>	  
				<div class="marsk">
					<p><a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a></p>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($news as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail">
				<p><a>{{$item->prod_name}}</a></p>
				<span class="price"> {{number_format($item->prod_price,0,',','.')}} đ</span>	  
				<div class="marsk">
					<p><a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a></p>
				</div>                                    
			</div>
			@endforeach
		</div>    
	</div>												
</div>
@stop			