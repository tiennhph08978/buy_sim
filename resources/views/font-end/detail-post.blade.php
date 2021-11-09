@extends('layout-fontend.index')
@section('title','Chi tiết bài viết')
@section('content')
	<div class="wrapper">
		<span class="text-uppercase" style="font-size: 15px;font-weight: 700;border-bottom:2px solid orange ;">{{ $blog->title }}</span>
		{!! $blog->description !!}		
		<div class="text-center mt-3">
			<a href="detail-table.html"><b><< Về trang trước</b></a>
		</div>
	</div>
@endsection