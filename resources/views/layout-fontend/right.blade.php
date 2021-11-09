<div class="col-xl-2 my-2">
	<div class="card">
			<h4 class="text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top" style="font-size: 14px;">Bán hàng online</h4>
		<div class="card-body">
			<div class="row text-center">
				{{-- <div class="col-xl-12 hotline">
					<a href="" class="btn btn-outline-dark mb-1">
						<img src="../img/phone1.jpg" height="30px" alt="">
						0392146603
					</a>
				</div> --}}
				<div class="col-xl-12 hotline">
					{{-- <a href="" class="btn btn-outline-dark mb-3">
						<img src="../img/zalo.png" height="30px" alt="">
						Chat
					</a> --}}
					<h3 class="mb-1 font-weight-bold" style="font-size: 1.17rem;">Góp ý, khiếu nại</h3>
					<a href=""><strong style="color: green;font-size: 16px;">081.629.777</strong></a>
				</div>
			</div>
		</div>
	</div>
	<div class="card mt-2">
		<div class="list-group">
			<p class="list-group-item text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top" style="font-size: 13px;">Bán hàng online</p>
			@foreach($cuss as $cus)
			<div class="list-group-item">
				<strong style="font-size:18px">{{ $cus->name }}</strong><br>
				<small style="font-weight:600;font-size:85%;">{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1***$3', $cus->phone) }}</small ><br>
				@if($cus->status==0)
				<small class="bg-success text-white rounded-right" style="padding:4px; font-weight: 700;">Đã g.hàng</small>
				@else
				<small class="bg-danger text-white rounded-right" style="padding:4px; font-weight: 700;">Chưa g.hàng</small>
				@endif
				<span>({{$cus->created_at->format('H:i')}})</span>
			</div>
			@endforeach
		</div>
	</div>
	{{-- <div class="card mt-2">
			<h4 class="text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top" style="font-size: 14px;">Bài viết</h4>
		<div class="list-group">
			<div class="list-group-item">
				Chính Sách Bán Hàng
			</div>
			<div class="list-group-item">
				Sim Data
			</div>
			<div class="list-group-item">
				Sim Số Đẹp
			</div>
		</div>
	</div> --}}
</div>