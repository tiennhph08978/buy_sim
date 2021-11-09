@extends('layout-admin.index')
@section('title','Sửa danh mục sim')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách sim</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center font-weight-bold">Sửa Sim</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.update-cate-sim',$cateSim->id) }}" method="post" class="row g-3 text-center">
		                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-12">
								<label class="form-label">Tên danh mục sim*</label>
								<input type="text" name="name" value="{{ $cateSim->name }}" class="form-control" id="inputEmail4">
							</div>
							@error('name')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							<div class="col-12">
								<button type="submit" class="btn btn-primary m-auto">Sửa</button>
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