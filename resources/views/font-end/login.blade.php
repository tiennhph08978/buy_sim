@extends('layout-fontend.index')
@section('title','login')
@section('content')
	<div class="wrapper mt-4">
		<span class="text-uppercase" style="font-size: 15px;font-weight: 700;">Đăng nhập</span>
		<div class="card" style="background: #cfe6d0;">
			<div class="card-body">
				<form action="{{ route('font-end.postLogin') }}" method="post">
					@csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email (*)</label>
				    <input type="email" class="form-control" name="email" id="email"  placeholder="Email đăng nhập">
				@error('email')
					<p style="color:red">{{$message}}</p>
				@enderror  
				</div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Mật khẩu (*)</label>
				    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
					@error('password')
					<p style="color:red">{{$message}}</p>
				@enderror  
				  </div>
				  <h3 class="text-center">
				  <button type="submit" class="btn btn-success">Đăng nhập</button>
				  </h3>
				</form>
			</div>
		</div>
		<div class="text-center">
			<a href="{{route('font-end.index')}}"><b><< Về trang trước</b></a>
		</div>
	</div>
@endsection