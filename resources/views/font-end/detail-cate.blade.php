@extends('layout-fontend.index')
@section('title','Chi tiết danh mục')
@section('content')
	<div class="wrapper mt-2">
		<div class="d-flex">
			<i class="fas fa-star" style="font-size: 25px;color: #343a40;"></i>
			<h2 class="ml-2 font-weight-bold">{{ $cate_name1->name }}</h2>
		</div>
		<div class="container">
		<div class="row">
				<div class="form-group col-md-4">
					<select id="timKiemTheoDauSo" class="form-control inputState">
						<option value="">Đầu số</option>
						<option value="03">Đầu 03</option>
						<option value="086">Đầu 086</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<select id="timKiemTheoMang" class="form-control inputState">
						<option value="">Mạng</option>
						<option value="viettel">Viettel</option>
						<option value="vina">Vinaphone</option>
						<option value="mobi">Mobiphone</option>
					</select>
				</div>
				<div class="col-md-4">
					<span class="float-right font-weight-bold text-danger" id="soLuongSim"></span>
				</div>
			</div>
			<table class="datatable-cate table mt-2 table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Số đt</th>
						<th>Giá</th>
						<th>Mạng</th>
						<th>Loại</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

<script>
		$(document).ready(function(){
			$(".inputState").select2({
				minimumResultsForSearch: -1 
			});
			id = {{ $cate_name1->id }};
			var table = $('.datatable-cate ').DataTable({
			processing: true, lengthChange: false, ordering: false,"serverSide": true,
			"pageLength": 50,
			"language": {
				"processing": "Đang xử lý...",
				"sLengthMenu": " _MENU_ Bản ghi hiển thị",
				"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
				"info": "Số lượng: _TOTAL_",
				"infoEmpty": "Số lượng: 0",
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
			ajax: {
				url: "{{ url('chi-tiet') }}",
				type: 'GET',
				data: function (d) {
					d.id = id;
					d.loaisim = $('#timKiemTheoMang').val();
					d.dauso = $('#timKiemTheoDauSo').val()
				}
			},
			columns: [
				{data: 'DT_RowIndex' , name: 'DT_RowIndex',  searchable: false},
				{data: 'phone_number', name: 'phone_number',
					"render": function(toFormat){
						return `<span class="phone_number">`+toFormat.toString().replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/g, '($1)-$2-$3')+`</span>`;
					}
				},
				{data: 'price', searchable: false,
					"render": function(data,type,row){
						if(data==0){
							return `<strong>Liên hệ</strong>`;
						}
						return `<strong>`+decialNumber(data)+`đ<strong>`;
					}
				},
				{data:null,
					'render':function(data,type,row){
						if(data['network_sim']=='viettel') {
							return `<strong style="color: #009688">viettel</strong>`;
						}else if(data['network_sim']=='vina'){
							return `<strong style="color: #2196f3">Vinaphone</strong>`;
						}else{
							return `<strong style="color: #00f">Mobiphone</strong>`;
						}
					}
				},
				{data: 'name', name: 'name'},
				{data: 'action', searchable: false},
			]
		});

		$("#timKiemTheoMang").change(function(){
			table
			.draw();
		})

		$("#timKiemTheoDauSo").change(function(){
			table
			.draw();
		})
		$("#soLuongSim").html($(".dataTables_info"))
	})

</script>
@endsection
