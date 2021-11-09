@extends('layout-fontend.index')
@section('title','Trang chủ')
@section('content')
<h4 class="mt-2 font-weight-bold">SIM số đẹp</h4>
<strong>Sim số đẹp</strong><span> giá rẻ các mạng Viettel, Mobi, Vina. Bán Sim số đẹp giá gốc, đăng ký thông tin chính
    chủ. Giao sim số đẹp miễn phí Toàn Quốc</span>
<div class="wrapper mt-2">
    <div class="d-flex">
        <i class="fas fa-thumbs-up icon_viettel"></i>
        <h2 class="ml-2 font-weight-bold">Sim viettel</h2>
    </div>

    <div class="row">
        @foreach($viettels as $viettel)
        <div class="col-lg-4 col-md-4 col-6 mb-1" style="padding:15px">
            <a href="{{ route('font-end.detail',$viettel->id) }}" class="simcard">
                <div class="card rounded" style="margin:-10px">
                    <div class="card-body m-auto d-flex" style="padding:1rem">
                        <img src="{{ asset('font-end/img/viettel.png') }}" height="40px" alt="">
                        <div class="ml-4">
                            <strong>{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3',
                                $viettel->phone_number) }}</strong>
                            <p>@if($viettel->price == 0)
                                Liên hệ
                                @else
                                {{ number_format($viettel->price) }}đ
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="m-auto" style="justify-content: center;text-align: center;">
        <a href="{{ route('font-end.detail_table_viettel') }}" class="btn btn-success">Xem thêm sim Viettel...</a>
    </div>
</div>
<!-- sim vinaphone -->
<div class="wrapper mt-2">
    <div class="d-flex">
        <i class="fas fa-thumbs-up icon_viettel"></i>
        <h2 class="ml-2 font-weight-bold">Sim Vinaphone</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach($vinas as $vina)
            <div class="col-lg-4 col-md-4 col-6 mb-1" style="padding:15px">
                <a href="{{ route('font-end.detail',$vina->id) }}" class="simcard">
                    <div class="card rounded" style="margin:-10px">
                        <div class="card-body m-auto d-flex" style="padding:1rem">
                            <img src="{{ asset('font-end/img/vina.png') }}" height="40px" width="40px" ; alt="">
                            <div class="ml-4">
                                <strong>{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3',
                                    $vina->phone_number) }}</strong>
                                <p>@if($vina->price == 0)
                                    Liên hệ
                                    @else
                                    {{ number_format($vina->price) }}đ
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="m-auto" style="justify-content: center;text-align: center;">
            <a href="{{ route('font-end.detail_table_vina') }}" class="btn btn-success">Xem thêm sim Vinaphone...</a>
        </div>
    </div>
</div>
<!-- simmobifone -->
<div class="wrapper mt-2">
    <div class="d-flex">
        <i class="fas fa-thumbs-up icon_viettel"></i>
        <h2 class="ml-2 font-weight-bold">Sim Mobifone</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach($mobis as $mobi)
            <div class="col-lg-4 col-md-4 col-6 mb-1" style="padding:15px">
                <a href="{{ route('font-end.detail',$mobi->id) }}" class="simcard">
                    <div class="card rounded" style="margin:-10px">
                        <div class="card-body m-auto d-flex" style="padding:1rem">
                            <img src="{{ asset('font-end/img/mobi.png') }}" height="40px" alt="">
                            <div class="ml-4">
                                <strong>{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3',
                                    $mobi->phone_number) }}</strong>
                                <p>@if($mobi->price == 0)
                                    Liên hệ
                                    @else
                                    {{ number_format($mobi->price) }}đ
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="m-auto" style="justify-content: center;text-align: center;">
            <a href="{{ route('font-end.detail_table_mobi') }}" class="btn btn-success">Xem thêm sim Mobifone...</a>
        </div>
    </div>
</div>
@endsection
