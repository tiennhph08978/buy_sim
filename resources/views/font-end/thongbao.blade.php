@extends('layout-fontend.index')
@section('title','Đặt hàng thành công')
@section('content')
	<div class="wrapper mt-4">
		<!-- dat sim -->
		<div class="card mt-2" style="background: #cfe6d0;">
			<div class="card-body text-center">
                <img src="{{ asset('font-end/img/like.png') }}" height="90px" alt=""> 
                <h3 class="font-weight-bold text-success mt-4">Đặt Sim thành công!</h3>
                <p class="text-success">Cảm ơn anh/chị đã đặt sim tại website của chúng tôi <br>
                    Chúng tôi sẽ liên lạc lại bằng điện thoại trong ít phút nữa.</p>
                    <p>Thông tin đặt hàng:</p>
                    <table style="margin:0 auto;color:#000;" border="1">
                    @foreach($suc as $cusss)
                        <tbody>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <td class="font-weight-bold">{{$cusss->phone_number}}</td>
                            </tr>
                            <tr>
                                <th>Giá bán</th>
                                <td class="font-weight-bold">
                                @if($cusss->price == 0)
										C.hàng sẽ liên hệ báo giá
										@else
										{{ number_format($cusss->price) }}đ
										@endif
                                </td>
                            </tr>
                            <tr>
                                <th>Hình thức thanh toán</th>
                                <td>{{$cusss->payment}}</td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng</th>
                                <td>{{$cusss->name}}</td>
                            </tr>
                            <tr>
                                <th>Số liên hệ</th>
                                <td>{{$cusss->phone}}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{$cusss->address}}</td>
                            </tr>
                        </tbody>
                        @endforeach 
                    </table>
			</div> 
		</div>
		<!-- huongdan -->
		<div class="text-center">
			<a href="{{ route('font-end.index') }}"><b><< Về trang trước</b></a>
		</div>
	</div>
@endsection