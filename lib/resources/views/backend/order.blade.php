@extends('backend.master')
@section('title','Danh sách người dùng')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đơn hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
                                            <th width="5%">ID</th>
                                                                                       
											<th width="13%">Người đặt hàng</th>
											<th width="10%">SĐT</th>
                                            <th width="15%">Địa chỉ </th>
											<th width="23%">Sản phẩm </th>
											<th width="12%">Tổng tiền</th> 
											<th width="10%">Trạng Thái</th>
											<th width="12%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>		
									@foreach($orderlist as $order)			
										<tr>
											<td>{{$order->or_id}}</td>
											<td>{{$order->or_name}}</td>
                                            <td>{{$order->or_phone}}</td>                                          
											<td>{{$order->or_address}}</td>
											<td>
												@foreach($chitiet as $tam)
													@if($tam->od_id == $order->or_id)
														<p>{{$tam->prod_name}} - {{$tam->od_quantity}} cái</p>
													@endif
												@endforeach
											</td>
											<td>
												@php
													$tong = 0;
												@endphp
												@foreach($chitiet as $tam)
													@if($tam->od_id == $order->or_id)
														@php
															$tong = $tong + $tam->od_price;
														@endphp
													@endif	
												@endforeach
												{{number_format($tong,0,',','.')}} VND
											</td>
                                            <td> 
                                                @if($order->or_status=='0')
                                                    Chưa xử lý
                                                @else
                                                    Đã xử lý
                                                @endif                                                                     
                                            </td>
											<td>
												<a href="{{asset('admin/order/check/'.$order->or_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xử lý</a>
												<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/order/delete/'.$order->or_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hủy</a>
											</td>
										</tr>	
									@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop