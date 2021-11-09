@extends('layout-admin.index')
@section('title','Bài viết')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách bài viết</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.blog.create') }}" class="btn btn-success">Thêm bài viết</a>
					</div>
					<div class="card-body">
						 @if(session('thongbao'))
	                        <div class="alert alert-success">
	                            {{ session('thongbao') }}
	                        </div>
	                    @endif
						<table class="table">
						  <thead class="thead-default">
						    <tr>
						      <th>#</th>
						      <th>Tiêu đề</th>
						      <th>Ảnh</th>
						      <th>Tóm tắt</th>
						      <th>Trạng thái</th>
						      <th>Thao tác</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($blogs as $key => $blog)
							   <tr>
							   	<td>{{ $key+1 }}</td>
							   	<td>{{ $blog->title }}</td>
							   	<td><img src="/storage/{{ $blog->image }}" class="mr-75" height="50"/></td>
							   	<td>{{ $blog->summary }}</td>
							   	<td>
							   	@if($blog->status==1)
							   	<span class="text-success">Kích hoạt</span>
							   	@else
							   	<span class="text-danger">Ẩn</span>
							   	@endif
								</td>
								<td>
									@if($blog->status==0)
							      	<a href="{{ route('admin.blog.active',$blog->id) }}" class="btn btn-primary"><i class="far fa-eye-slash"></i></a>
							      	@else
							      	<a href="{{ route('admin.blog.unactive',$blog->id) }}" class="btn btn-primary"><i class="far fa-eye"></i></a>
							      	@endif
									<a href="{{ route('admin.blog.destroy',$blog->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
								</td>
							   </tr> 
						    @endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection