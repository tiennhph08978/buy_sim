@extends('layout-admin.index')
@section('title','Thêm danh mục sim')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách sim</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center font-weight-bold">Thêm Sim</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.post-cate-sim') }}" method="post" class="row g-3 text-center">
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-12">
								<label class="form-label">Tên danh mục sim*</label>
								<input type="text" name="name" class="form-control" id="inputEmail4">
							</div>
							@error('name')
								<p class="text-danger">{{ $message }}</p>
							@enderror
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