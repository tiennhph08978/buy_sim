<div class="col-xl-2 pb-1">
    <!-- <div class="list-group">
		<div class="card">
				<h4 class="text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top" style="font-size: 14px;">Sim theo giá</h4>
				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<a href="" class="list-group-item">Sim dưới 500k</a>
						<a href="" class="list-group-item">Sim từ 500k-3tr</a>
						<a href="" class="list-group-item">Sim từ 3tr-5tr</a>
						<a href="" class="list-group-item">Sim từ 5tr-10tr</a>
						<a href="" class="list-group-item">Sim trên 10tr</a>
					</div>
				</div>
		</div>
	</div>  -->
    <div class="list-group mt-2">
        <div class="card">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <a class="list-group-item disable text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top"
                        style="font-size: 14px;">Sim theo mạng</a>
                    <a href="{{ route('font-end.detail_table_viettel') }}"
                        class="list-group-item {{ Request::routeIs('font-end.detail_table_viettel') ? 'active' : '' }}">Sim
                        Viettel</a>
                    <a href="{{ route('font-end.detail_table_vina') }}"
                        class="list-group-item {{ Request::routeIs('font-end.detail_table_vina') ? 'active' : '' }}">Sim
                        Vinaphone</a>
                    <a href="{{ route('font-end.detail_table_mobi') }}"
                        class="list-group-item {{ Request::routeIs('font-end.detail_table_mobi') ? 'active' : '' }}">Sim
                        Mobifone</a>
                </div>
            </div>
        </div>
    </div>
    <div class="list-group mt-2">
        <div class="card">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <a class="list-group-item disable text-center py-2 text-white text-uppercase bg-dark font-weight-bold rounded-top"
                        style="font-size: 14px;">Sim theo loại</a>
                    @foreach($cateSims as $sim)
                    <a href="{{ route('font-end.detail_cate',$sim->id) }}" class="list-group-item">{{ $sim->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
