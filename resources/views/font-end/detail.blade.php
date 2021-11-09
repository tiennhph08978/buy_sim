@extends('layout-fontend.index')
@section('title','Chi tiết thẻ sim')
@section('content')
	<div class="wrapper mt-4">
		@if(session('thongbao'))
				<p class="text-white bg-success p-2">{{session('thongbao')}}</p>
		@endif
		<span class="text-uppercase" style="font-size: 15px;font-weight: 700;">Sim khuyến mãi trong ngày</span>
		<div class="card">
			<div class="card-body">
				<div class="row m-auto">
					<div class="col-xl-6">
						<label style=" width: 65px; text-align: left; ">Số sim:</label> 
						<span style="color:red;font-size: 26px;font-weight: 700;">{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $sim->phone_number) }}</span><br>
						<label style=" width: 65px; text-align: left; ">Giá bán:</label> 
						<strong>
							<font size="3">
							@if($sim->price == 0)
							Liên hệ
							@else
							{{ number_format($sim->price) }}đ
							@endif	
							</font>
						</strong><br>
						<label style=" width: 65px; text-align: left; ">Loại sim:</label> 
						<span>{{ $sim->name }}</span><br>
						<label style=" width: 65px; text-align: left; ">Mạng:</label> 
						@if($sim->network_sim == 'viettel')
						<img src="{{ asset('font-end/img/viettel.png') }}" height="40px" alt=""><br>
						@elseif($sim->network_sim=='mobi')
						<img src="{{ asset('font-end/img/mobi.png') }}" height="40px" alt=""><br>
						@elseif($sim->network_sim=='vina')
						<img src="{{ asset('font-end/img/vina.png') }}" height="40px" alt=""><br>
						@elseif($sim->network_sim=='vietnamobile')
						<img src="{{ asset('font-end/img/vietnam.png') }}" height="35px" alt=""><br>
						@endif
						<label class="mt-3" style=" width: 100%; text-align: left; ">
							<span style="font-style: italic;font-size: 13px;">- Giao sim miễn phí trên toàn quốc !</span>
						</label> 
					</div>
					<div class="col-xl-6"><img src="{{ asset('font-end/img/sim.jpg') }}" alt=""></div>
				</div>
			</div>
		</div>
		<!-- dat sim -->
		<div class="card mt-2" style="background: #cfe6d0;">
			<div class="card-body">
				<h3 class="text-center text-uppercase"><strong>Đặt Sim</strong></h3>
				
				<form action="{{route('store.customer_sim')}}" name="formDatSim" id="formDatSim" method="post">
					@csrf
					<input type="hidden" name="id_sim" value="{{ $sim->id }}">
					<div class="form-group">
						<label for="exampleInputEmail1">Điện thoại liên hệ <span class="text-danger">*</span></label>
						<input type="tel" autocomplete="none" class="form-control" name="phone" id="phone"  placeholder="Số điện thoại">
					@error('phone')
						<p class="text-danger">{{ $message }}</p>
					@enderror
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Họ và tên <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên">
					@error('name')
						<p class="text-danger">{{ $message }}</p>
					@enderror
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Địa chỉ <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
					@error('address')
						<p class="text-danger">{{ $message }}</p>
					@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Ghi chú thêm</label>
						<textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					<div class="form-group checkbox">
						<input type="checkbox" name="payment[]" value="Thanh toán khi nhận hàng" checked />
						<label>Thanh toán khi nhận hàng</label>
					</div>
					<div class="form-group checkbox">
						<input type="checkbox" name="payment[]" value="Chuyển khoản ngân hàng" />
						<label>Chuyển khoản ngân hàng</label>
					</div>
					<div class="form-group checkbox">
						<input type="checkbox" name="payment[]" value="Xuất hoá đơn công ty" />
						<label>Xuất hoá đơn công ty</label>
					</div>
					<h3 class="text-center">
						<button type="submit" class="text-white btn btn-success">Đặt sim</button>
					</h3>
				</form>
				<p  class="text-center"><strong>Số đẹp:{{ $sim->phone_number }}, Số tiền:{{ number_format($sim->price) }} đ</strong></p>
			</div>
		</div>
		<!-- huongdan -->
		<div class="card mt-2">
			<div class="card-body">
				<p><b>Hướng dẫn cách thức mua sim {{ $sim->phone_number }}:</b></p>
				<ul>
					<li>Cách 1: SimVNN giao sim và thu tiền tận nhà miễn phí (áp dụng Hà Nội)</li>
					<li>Cách 2: Quý  khách đếncửa hàng tại Hà Nội (<a href="{{route('font-end.index')}}">Xem địa chỉ cửa hàng tại đây</a>)</li>
					<li>Cách 3: Đặt cọc và thanh toán tiền còn lại khi nhận sim (áp dụng tại các tỉnh không có đại lý): Quý khách đảm bảo việc mua hàng bằng cách đặt cọc tối thiểu 10% giá trị sim qua chuyển khoản hoặc mã thẻ cào (<a href="{{route('font-end.index')}}">Xem danh sách tài khoản ngân hàng tại đây</a>). Chúng tôi sẽ gửi bưu điện phát sim đến tay quý khách và thu tiền còn lại <em>(Hệ thống bưu điện trên cả nước đều cung cấp dịch vụ thu hộ tiền cho người bán - gọi tắt là COD. Theo đó, bưu điện sẽ giao hàng (sim) đến tận tay quý khách và thu tiền cho chúng tôi)</em></li>
				</ul>
				<p><em>Chúc quý khách gặp nhiều may mắn khi sở hữu thuê bao <b>081.629.7777</b></em></p>
			</div>
		</div>
		<div class="text-center">
			<a href="{{ route('font-end.index') }}"><b><< Về trang trước</b></a>
		</div>
	</div>
<style type="text/css">
	input[type='checkbox'] {
		width: 20px;
		height: 20px;
		border-radius: 50%;
		cursor: pointer;
	}
	.checkbox label{
		text-align: left;
		position: absolute;
		padding-top: 3px;
		padding-left: 5px;
		line-height: 15px;
	}
	#phone-error,#name-error,#address-error {
		padding-top: 10px;
		color: red;
	}
</style>


<!-- <script type="text/javascript">	
$(document).ready(function(){

		$(function(){
			let formDatSim = $("#formDatSim");
			if (formDatSim.length) {
				formDatSim.validate({
					rules:{
						phone:{
							number: true,
							required:true,
							minlength:8,
						},
						name:{
							required:true,
							minlength:6,
						},
						address: {
							required:true,
						}
					},
					messages:{
						phone:{
							number: "Vui lòng nhập đúng định dạng số điện thoại",
							required:"Vui lòng nhập số điện thoại",
							minlength: "Vui lòng nhập đúng định dạng số điện thoại",
						},
						name:{
							required:"Vui lòng nhập họ tên",
							minlength:"Vui lòng nhập trên 6 kí tự"
						},
						address: {
							required: "Vui lòng nhập địa chỉ"
						}
					},
					submitHandler: function(form) {
						$.ajax({
							type: "POST",
							url: "{{ url('store-dat-sim') }}",
							data: formDatSim.serialize(),
							success: function( response ) {
								console.log(response);
							}
						});
					}
				})
			}
		})
	})
</script> -->
@endsection