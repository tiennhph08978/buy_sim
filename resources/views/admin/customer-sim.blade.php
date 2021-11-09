@extends('layout-admin.index')
@section('title','Danh sách khách hàng đặt')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Danh sách đặt sim</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						@if(session('thongbao'))
						<p class="text-success">{{ session('thongbao') }}</p>
						@endif
						<table class="table table-responsive" id="datatable">
						  <thead class="thead-default">
						    <tr>
						      <th>#</th>
						      <th>SDT bán</th>
						      <th>Tên khách</th>
						      <th>SĐT khách</th>
						      <th>Địa chỉ khách</th>
						      <th>Ghi chú khách</th>
						      <th>Phương thức</th>
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
			// serverSide: true,
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
			ajax: "{{ route('index.customer_sim') }}",
			columns: [
			{data: 'DT_RowIndex' , name: 'DT_RowIndex'},
			// {data: null,
			// 	"render": function(data,type,row){
			// 		return `<span class="phone_number">${data['phone_number'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ')}</span>`;
			// 	}
			// },
			{data: null,
				"render": function(data,type,row){
					return `<span class="phone_number">${data['phone_number']}</span>`;
				}
			},
			{data: 'name'},
			{data: 'phone'},
			{data: 'address'},
			{data: 'note'},
			{data:'payment'},
			// {data: 'price'},
			{data:null,
				'render':function(data,type,row){
					if(data['status']==0) {
						return `<span class="font-weight-bold text-success">Đã duyệt</span>`;
					}else{
						return `<span class="font-weight:-bold text-danger">Chưa duyệt</span>`;
					}
				}
			},
			{data: 'action'},
			]
		});
	})
</script>
@endsection