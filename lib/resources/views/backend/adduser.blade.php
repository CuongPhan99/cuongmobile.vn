@extends('backend.master')
@section('title','Thêm người dùng')
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
					<div class="panel-heading">Thêm người dùng</div>
					@include('errors.note')
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data" autocomplete="off">
							@csrf
                            <div class="row" style="margin-bottom:40px">                               
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên người dùng</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giới tính</label>
										<select required name="sex" class="form-control">
											<option>Nam</option>
											<option>Nữ</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>SĐT</label>
										<input required type="text" name="phone" class="form-control">
									</div>
									<div class="form-group" >
										<label>Địa chỉ</label>
										<input required type="text" name="address" class="form-control">
									</div>
									<div class="form-group" >
										<label>Email</label>
										<input required type="text" name="email" class="form-control">
									</div>
									<div class="form-group" >
										<label>Mật khẩu</label>
										<input required type="text" name="password" class="form-control">
									</div>
									<div class="form-group" >
										<label>Cấp</label>
										<select required name="level" class="form-control">
											<option>1</option>
                                            <option>2</option>
                                            <option>3</option>
					                    </select>
									</div>								
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{asset('admin/user')}}" class="btn btn-danger">Hủy bỏ</a>
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