@extends('layout-admin.index')
@section('title','Danh sách sim')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách sim</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.add-sim') }}" class="btn btn-success">Thêm sim</a>
					</div>
					<div class="card-body">
						@if(session('thongbao'))
							<p class="text-success">{{ session('thongbao') }}</p>
						@endif
						<table class="table" id="datatable">
						  <thead class="thead-default" >
						    <tr>
						      <th>#</th>
						      <th>SDT bán</th>
						      <th>Giá</th>
						      <th>Mạng sim</th>
						      <th>Danh mục</th>
						      <th>Trạng thái</th>
						      <th>Thao tác</th>
						    </tr>
						  </thead>
						  <tbody>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		var table = $('#datatable').DataTable({
			processing: true, info: false, "lengthChange": false,
			serverSide: true,
			"pageLength": 10,
			"language": {
				"processing": "Đang xử lý...",
				"sLengthMenu": " _MENU_ Bản ghi hiển thị",
				"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
				"info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
				"infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
				"infoFiltered": "",
				"emptyTable": "Không có dữ liệu",
				"loadingRecords": "Đang tải...",
				"paginate": {
					"first": "Đầu tiên",
					"last": "Cuối cùng",
					"next": "Sau",
					"previous": "Trước"
				},
			},
			ajax: "{{ route('admin.sim') }}",
			columns: [
			{data: 'id' , name: 'id'},
	
			{data: null,
				"render": function(data,type,row){
					return `<span class="phone_number" style="font-size:1.5rem">${data['phone_number']}</span>`;
				}
			},
			{data: 'price',
				"render": function(data,type,row){
					return `<div class="font-weight-bold">`+decialNumber(data)+`đ</div>`;
				}
			},
			// {data:'phone_number'},
			// {data: 'price'},
			{data:null,
				'render':function(data,type,row){
					if(data['network_sim']=='viettel') {
						return `<span style="font-weight:700">viettel</span>`;
					}else if(data['network_sim']=='vina'){
						return `<span style="font-weight:700">Vinaphone</span>`;
					}else{
						return `<span style="font-weight:700">Mobiphone</span>`;
					}
				}
			},
			{data: 'name'},
			{data:null,
				'render':function(data,type,row){
					if(data['status']==1) {
						return `<span  class="text-success" style="font-weight:700">Hoạt động</span>`;
					}else{
						return `<span class="text-danger" style="font-weight:700">Đã bán</span>`;
					}
				}
			},
			{data: 'action'},
			]
		});
	})
</script>
@endsection