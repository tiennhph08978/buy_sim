@extends('layout-admin.index')
@section('title','Thêm tài khoản')
@section('style')
<style>
	.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>
@endsection
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Tài khoản</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center font-weight-bold">Thêm tài khoản</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" method="post" action="{{ route('admin.user.store') }}">
							@csrf
							<div class="form-group">
								<label class="control-label mb-2">Name</label>
									<input type="text" class="form-control" name="name" placeholder="Tien">
							</div>
							<div class="form-group">
								<label class="control-label mb-2">Email</label>
									<input type="email" class="form-control" name="email" placeholder="admin@gmail.com">
							</div>
							<div class="form-group">
					            <label class="control-label mb-2">Password</label>
					              <input id="password-field" type="password" class="form-control" name="password" placeholder="*****">
					        </div>
					        <div class="mt-2">
					        	<button type="submit" class="btn btn-primary">Thêm</button>
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
	$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
@endsection