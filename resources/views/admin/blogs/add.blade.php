@extends('layout-admin.index')
@section('title','Thêm bài viết')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách bài viết</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center font-weight-bold">Thêm bài viết</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data" class="row g-3">
		                    {{ csrf_field() }}
							<div class="col-md-6">
								<label class="form-label">Tiêu đề*</label>
								<input type="text" name="title" class="form-control" id="inputEmail4">
							@error('name')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							</div>

							<div class="col-md-6">
								<label class="form-label">Ảnh*</label>
								<input type="file" name="image" class="form-control" id="inputEmail4">
							@error('image')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							</div>
							<div class="col-md-6">
								<label class="form-label">tóm tắt*</label>
								<input type="name" name="summary" class="form-control" id="inputEmail4">
							@error('image')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							</div>
							<div class="col-md-12">
								<label class="form-label">Chi tiết*</label>
								<textarea class="form-control" id="ckeditor_dis" name="description"></textarea>
							</div>

							<div class="col-12">
								<button type="submit" class="btn btn-primary m-auto">Thêm</button>
								<a href="{{ route('admin.cate-sim') }}" class="btn btn-danger m-auto">Thoát</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection
@section('script')
<script>
	CKEDITOR.replace('ckeditor_dis');
</script>
@endsection