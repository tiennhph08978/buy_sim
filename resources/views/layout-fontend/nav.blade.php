<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand" style="padding-top:0;padding-bottom:0" href="{{ route('font-end.index') }}"><img
                src="{{asset('font-end/img/1.png')}}" height="45px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('font-end.index') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('font-end.post') }}">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('font-end.contact') }}">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('font-end.login') }}">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
