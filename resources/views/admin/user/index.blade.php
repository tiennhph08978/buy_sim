@extends('layout-admin.index')
@section('title','Tài khoản')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách Tài khoản</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.user.create') }}" class="btn btn-success">Thêm tài khoản</a>
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
						      <th>Tên</th>
						      <th>Email</th>
						      <th>Thao tác</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($users as $key => $user)
							    <tr>
							      <th scope="row">{{ $key+1 }}</th>
							      <td>{{ $user->name }}</td>
							      <td>{{ $user->email }}</td>
							      <td>
							      	<a href="{{ route('admin.user.destroy',$user->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
							      </td>
							    </tr>
						    @endforeach
						  </tbody>
						</table>
						{{ $users->links() }}
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection