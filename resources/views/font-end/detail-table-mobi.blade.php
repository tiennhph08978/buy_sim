@extends('layout-fontend.index')
@section('title','Chi tiết sim mobiphone')
@section('content')
<div class="wrapper mt-4">
    <div class="clearfix">
        <span class="text-uppercase" style="font-size: 15px;font-weight: 700;margin-left: 15px;">Sim Vinaphone</span>
        <span class="float-right font-weight-bold text-danger" id="soLuongSim"></span>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="form-group col-md-4">
                <select id="timKiemTheoDauSo" class="form-control inputState">
                    <option value="">Đầu số</option>
                    <option value="07">Đầu 07</option>
                    <option value="089">Đầu 089</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select id="timKiemTheoLoaiSim" class="form-control inputState">
                    <option selected value="">Loại sim</option>
                    @foreach($cateSims as $sim)
                    <option>{{ $sim->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table id="datatable" class="table mt-2 table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <h4 class="text-center mt-5"><strong>SIM TRẢ GÓP - BÍ QUYẾT CHỌN SIM</strong></h4>
        <div class="contenttext mt-2">
            <p class="text-center" style="font-style: 14px !important;"><strong>SIM TRẢ GÓP - NHẬN SIM TRƯỚC, TRẢ TIỀN
                    SAU</strong></p>
            <strong>Sim trả góp được biết đến là hình thức mua sim, thay vì trả ngay lập tức một khoản tiền lớn thì
                khách hàng có thể trả cho người bán từng đợt một giá trị của sim số. Mỗi khách hàng sẽ được lựa chọn mức
                trả trước, lãi suất và thời gian trả phù hợp nhất với bản thân và khả năng. Cụ thể như thế nào mời bạn
                tham khảo ngay dưới đây nhé:</strong>
            <p class="mt-2"><b>1. Tại sao bạn nên mua Sim Số Đẹp Trả Góp?</b></p>
            <p>Mua sim trả góp giúp bạn có thể thoải mái lựa chọn bộ sim số đẹp mình yêu thích như sim tứ quý, Thần Tài,
                Lộc Phát,...… mà không cần lo lắng, bận tâm về giá cả.</p>
            <p>Thay vì trả thẳng hay vay mượn để mua số sim yêu thích thì mua sim trả góp còn giúp bạn sử dụng số tiền
                còn lại để đầu tư sinh lãi cực cao ở những dự án lớn.</p>
            <p><b>2. Sim trả góp giá từ bao nhiêu?</b></p>
            <p>Hiện nay thì hình thức hỗ trợ khách hàng mua sim trả góp tại Sim Thăng Long với mức giá áp dụng trả góp
                là từ 10 triệu đồng trở lên.</p>
            <p><b>3. Sim trả góp gồm những dạng sim nào?</b></p>
            <p>Hầu hết các loại sim số thần tài, lộc phát, tam hoa tứ quý, lục quý… có giá 10 triệu trở lên của các nhà
                mạng đều được Sim Thăng Long hỗ trợ trả góp với lợi ích hướng đến khách hàng.</p>
            <p><strong><img src="../img/raw.gif" alt="">Xem ngay: </strong><a href="">Danh sách sim trả góp đẹp tại Sim
                    Thăng Long</a></p>
            <p><b>4. Dịch vụ trả góp tại Sim Thăng Long như thế nào?</b></p>
            <p>Mua sim trả góp bạn vẫn hay nghe là dùng để chỉ một hình thức mua bán sim số mà ở đó, thay vì phải thanh
                toán “một cục”, người mua sẽ được trả tiền dần dần hàng tháng với mức lãi suất và thời gian nhất định.
            </p><br>
            <strong>Đến với Sim Thăng Long bạn sẽ được:</strong>
            <ul>
                <li>Hỗ trợ trả góp 0%</li>
                <li>Nhận sim, thanh toán tối thiểu 30% – 50% tùy dạng sim và giá trị sim.</li>
                <li>Sau đó hàng tháng, bạn sẽ trả dần tiền gốc và tiền lãi suất tính trên phần tiền mua sim còn thiếu
                    theo quy định.</li>
            </ul>
            <p><em>Nhanh tay Mua Sim Trả Góp ngay hôm nay tại Sim Thăng Long để thỏa đam mê sở hữu Sim Số Đẹp trong tay
                    nào..!</em></p>
        </div>
    </div>
</div>
<style type="text/css">
    #datatable thead {
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
		$(".inputState").select2({
			minimumResultsForSearch: -1
		});

		var table = $('#datatable').DataTable({
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
				url: "{{ route('font-end.detail_table_mobi') }}",
				data: function (d) {
					d.loaisim = $('#timKiemTheoLoaiSim').val();
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
							return `<div class="font-weight-bold">Liên hệ</div>`;
						}
						return `<div class="font-weight-bold">`+decialNumber(data)+`đ</div>`;
					}
				},
				{data: 'name', name: 'name'},
				{data: 'action', searchable: false},
				{data: null, "visible": false,
					"render": function(data,type,row){
						return data['phone_number'].slice(0,2)
					}
				},
			]
		});

		$("#timKiemTheoLoaiSim").change(function(){
			table
			.draw();
		})

		$("#timKiemTheoDauSo").change(function(){
			table
			.draw();
		})

		$("#soLuongSim").html($("#datatable_info"))

	})
</script>
@endsection
