@extends('layout-fontend.index')
@section('title','Bài viết')
@section('content')
	<div class="wrapper">
		<span class="text-uppercase" style="font-size: 15px;font-weight: 700;border-bottom:2px solid orange ;">Bài viết</span>
		<p class="mt-2">Tổng hợp các bài viết nội dung liên quan đến vấn đề mua hàng, đổi trả hàng, bảo mật thông tin khách hàng… giúp quá trình mua sắm, sử dụng của bạn trở nên dễ dàng hơn bao giờ hết.</p>
		<div class="row">
			@foreach($blogs as $blog)
				<div class="col-sm-6 mt-2">
				    <div class="card">
				    	<img class="card-img-top" src="/storage/{{ $blog->image }}" alt="Card image cap">
						<div class="card-body">
				        	<h5 class="card-title font-weight-bold"><a href="{{ route('font-end.detail-post',$blog->id) }}">{{ $blog->title }}</a></h5>
				        	<h6 class="card-subtitle mb-2 text-muted">{{ $blog->created_at }}</h6>
				        	<p class="card-text">{{ $blog->summary }}</p>
				        	<p>{!!  Str::limit( strip_tags( $blog->description ), 50 ) !!}</p>
				        	<a href="{{ route('font-end.detail-post',$blog->id) }}" class="btn btn-outline-primary text-uppercase font-weight-bold">Chi tiết</a>
				      	</div>
				    </div>
				</div>
			@endforeach
		</div>
		<div class="text-center mt-3">
			<a href="detail-table.html"><b><< Về trang trước</b></a>
		</div>
	</div>
@endsection