@extends('backend.master')
@section('title','Sửa người dùng')
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
					<div class="panel-heading">Xem thông tin người dùng</div>
					@include('errors.note')
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							@csrf
                            <div class="row" style="margin-bottom:40px">                               
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên người dùng</label>
                                        <input disabled type="text" name="name" class="form-control" value="{{$user->name}}">
									</div>
									<div class="form-group" >
										<label>Giới tính</label>
										<input disabled name="sex" class="form-control" value="{{$user->sex}}">				             
									</div>
									<div class="form-group" >
										<label>SĐT</label>
										<input disabled type="text" name="phone" class="form-control" value="{{$user->phone}}">
									</div>
									<div class="form-group" >
										<label>Địa chỉ</label>
										<input disabled type="text" name="address" class="form-control" value="{{$user->address}}">
									</div>
									<div class="form-group" >
										<label>Email</label>
										<input disabled type="text" name="email" class="form-control" value="{{$user->email}}">
									</div>		
									<div class="form-group" >
										<label>Cấp</label>
										<input disabled name="level" class="form-control" value="{{$user->level}}">
									</div>															
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop