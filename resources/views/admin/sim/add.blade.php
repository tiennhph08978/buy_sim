@extends('layout-admin.index')
@section('title','Thêm sim')
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
						<form action="{{ route('admin.store-sim') }}" method="post" class="row g-3">
							@csrf
							<div class="col-md-6">
								<label class="form-label">Số Sim*</label>
								<input type="text" name="phone_number" class="form-control" id="inputEmail4">
							@error('phone_number')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							</div>
							<div class="col-md-6">
								<label class="form-label">Giá bán</label>
								<input type="number" name="price" class="form-control" id="inputPassword4">
							@error('price')
								<p class="text-danger">{{ $message }}</p>
							@enderror
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Sim theo mạng</label>
								<select id="inputState" name="network_sim" class="form-select">
									<option selected value="viettel">Sim viettel</option>
									<option value="vina">Sim vinaphone</option>
									<option value="mobi">Sim mobifone</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Loại sim</label>
								<select id="inputState" name="id_cate_sim" class="form-select">
									@foreach($cateSims as $cateSim)
									<option value="{{$cateSim->id}}">{{ $cateSim->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary m-auto">Thêm</button>
								<a href="{{ route('admin.sim') }}" class="btn btn-danger">Thoát</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection