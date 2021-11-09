@extends('layout-admin.index')
@section('title','Danh danh mục sim')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.add-cate-sim') }}" class="btn btn-success">Danh mục sim</a>
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
						      <th>Name</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($cateSims as $key => $cateSim)
							    <tr>
							      <th scope="row">{{ $key+1 }}</th>
							      <td>{{ $cateSim->name }}</td>
							      <td>
							      	<a href="{{ route('admin.edit-cate-sim',$cateSim->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
							      	<a href="{{ route('admin.delete-cate-sim',$cateSim->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
							      </td>
							    </tr>
						    @endforeach
						  </tbody>
						</table>
						{{ $cateSims->links() }}
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection