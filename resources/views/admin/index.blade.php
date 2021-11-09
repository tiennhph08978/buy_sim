@extends('layout-admin.index')
@section('title','Trang chủ')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Tổng quan</strong></h1>

		<div class="row">
			<div class="col-xl-12 col-xxl-12 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Tổng Sim</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="fas fa-sim-card"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $sim->count() }}</h1>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Tổng khách hàng đặt</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="fas fa-users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $countcus->count() }}</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection