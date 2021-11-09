<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sim VNN - sim số đẹp">
	<meta name="author" content="Sim VNN">
	<link rel="icon" href="{{asset('icon1.png')}}">
	<title>@yield('title')</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="{{ asset('font-end/css/bootstrap.css') }}">
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('font-end/css/style.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		function decialNumber(number){
			return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 0, maximumFractionDigits:2}).format(number);
		}
	</script>
	<style>
		#datatable_filter {
			display: none;
		}
		.dataTables_filter{
			display: none;
		}
		.mt-5{
			margin-top: 6rem !important;
		}
		.dataTables_paginate {
			float:right;
			/* margin: 10px 0 10px 0 ; */
		}
		.paginate_button{
			padding: 10px;
			background:#e0dada;
			margin:2px;
		}
		/* .page-item.active .page-link {
			z-index: 1;
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
			} */
			.phone_number {
				font-weight: 700;
				color: #390;
				text-decoration: none;
			}
			.dataTables_paginate {
				cursor: pointer;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/_@.com"])
		@include('layout-fontend.nav')
		<!-- content -->
		<div class="container" style="background-color:#fff" >
			<!-- slider -->
			@include('layout-fontend.slider')

			<!-- end slider -->
			<!-- content -->
			<div class="row">
				@include('layout-fontend.left')
				<div class="col-xl-8 my-2">
					<!-- simviettel -->
					<div class="card">
						<div class="card-body bg-dark">
							<div class="input-group">
								<input type="text" class="form-control formatPhone" autocomplete="off" id="autoSearchTable">
								<div class="input-group-append">
									<button class="btn btn-warning" id="search-btn" type="button"><i class="fas fa-search" ></i> Tìm kiếm</button>
								</div>
							</div>
							<ul class="list-group mt-3 ml-3">
								<li class="list-item text-white">Tìm sim có đuôi <strong>888</strong>, bạn hãy gõ <strong>888</strong> </li>
								<li class="list-item text-white">Tìm sim có đuôi <strong>6000</strong>, bạn hãy gõ <strong>6000</strong> </li>
								<li class="list-item text-white">Tìm sim theo ngày sinh, bạn hãy gõ <strong>1999</strong> </li>
							</ul>
						</div>
						<div id="search-list" style="display:none;padding-bottom: 10px">
							<table style="width:100%" id="datatable-search" class="table table-hover">
								<thead>
									<tr>
										<th id="stt">#</th>
										<th id="sodt">Số điện thoại</th>
										<th id="giatien">Giá tiền</th>
										<th id="mang">Mạng</th>
										<th id="loai">Loại</th>
										<th id="action"></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					@yield('content')
				</div>


				@include('layout-fontend.right')
			</div>

			<!-- endcontent -->
		</div>
		<!-- footer -->
		@include('layout-fontend.footer')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				$(".formatPhone").keypress(function (e) {
					if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
						return false;
					}
				});

				$("#autoSearchTable").keyup(function(){
					if($(this).val().length==0){
						$("#search-list").css('display','none');
					}
				})
				
				$("#autoSearchTable").autocomplete({
					source: function( request, response ) {
						$.ajax({
							url:"{{url('/search')}}",
							type: 'get',
							dataType: "json",
							data: {
								_token:"{{ csrf_token() }}",
								search: request.term
							},
							success: function( data ) {
								$("#search-list").css('display','block');
								$('#datatable-search').DataTable({
									processing: true, lengthChange: false, ordering: false, destroy: true, info: false,
									"pageLength": 30,
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
									aaData: data,
									columns: [
									{data: 'id', name: 'id'},
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
									{data:null,
										'render':function(data,type,row){
												return "<a href='/chi-tiet-sim/"+ row.id +"' class='btn btn-warning text-white'>Mua sim</a>"
										}
									},
									]
								});
							}
						});
					},
				});
			})
		</script>
		<style type="text/css">
			#datatable-search #stt {
				width: 8%!important;
			}
			#datatable-search #sodt {
				width: 28%!important;
			}
			#datatable-search #giatien {
				width: 24%!important;
			}
			#datatable-search #loai {
				width: 15%!important;
			}
			#datatable-search #mang {
				width: 12%!important;
			}
			#datatable-search #action {
				width: 12%!important;
			}
			.dataTables_paginate {
				float: none;
				text-align: center;
			}
		</style>

	</body>
	</html>