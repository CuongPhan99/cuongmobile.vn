@extends('backend.master')
@section('title','Danh sách người dùng')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Người dùng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách người dùng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
							<a href="{{asset('admin/user/add')}}" class="btn btn-primary">Thêm tài khoản</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th width="10%">ID</th>
											<th width="20%">Tên người dùng</th>
											<th width="20%">Email</th>
											<th width="20%">SĐT</th>
											<th width="15%">Địa chỉ</th>
											<th width="15%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>		
										@foreach($userlist as $user)						
										<tr>
											<td>{{$user->id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->phone}}</td>
											<td>{{$user->address}}</td>
											<td>
												<a href="{{asset('admin/user/edit/'.$user->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/user/delete/'.$user->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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