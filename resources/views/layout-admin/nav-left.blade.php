<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
			<span class="align-middle">AdminKit</span>
		</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item {{ (request()->routeIs('admin.index')) ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.index') }}">
					<i class="fas fa-home"></i> <span class="align-middle">Trang chủ</span>
				</a>
			</li>

			<li class="sidebar-item {{ (request()->routeIs('admin.cate-sim')) ||  (request()->routeIs('admin.add-cate-sim'))  ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.cate-sim') }}">
					<i class="fab fa-buffer"></i> <span class="align-middle">Danh mục sim</span>
				</a>
			</li>

			<li class="sidebar-item {{ (request()->routeIs('admin.sim')) ||  (request()->routeIs('admin.add-sim'))  ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.sim') }}">
					<i class="fas fa-sim-card"></i> <span class="align-middle">Sim</span>
				</a>
			</li>

			<li class="sidebar-item {{ (request()->routeIs('index.customer_sim')) ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('index.customer_sim') }}">
					<i class="fas fa-users"></i> <span class="align-middle">Khách đặt sim</span>
				</a>
			</li>

			<li class="sidebar-item {{ (request()->routeIs('admin.blog')) ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.blog') }}">
					<i class="fas fa-blog"></i> <span class="align-middle">Bài viết</span>
				</a>
			</li>
			
			<li class="sidebar-item {{ (request()->routeIs('admin.user')) ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.user') }}">
					<i class="fas fa-user"></i> <span class="align-middle">Tài khoản</span>
				</a>
			</li>
		</ul>
	</div>
</nav>