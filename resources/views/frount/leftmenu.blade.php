<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark elevation-4">
	<!-- Brand Logo -->
	<a href="{{route('dashboard')}}" class="brand-link">
		<!-- <img src="{{ asset('public/dist/img/download.png')}}" alt="BFLDT" class="brand-image " height="100px" width="100px"> -->

		<h2 style="color: #007bff;">Knowledge Bank</h1>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			@php $active= collect(request()->segments())->last() @endphp
			@php $active= request()->segment(1); @endphp

			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview menu-open">
					<!--<a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>-->

					<ul class="nav nav-treeview">
						@if (Auth::user()->emp_type=="admin")
						<li class="nav-item">
							<a href="{{route('categories')}}" class="nav-link <?php echo ($active == 'categories') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Manage Categories </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('subcategories')}}" class="nav-link <?php echo ($active == 'subcategories') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Manage subcategories </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('treemappings')}}" class="nav-link <?php echo ($active == 'treemappings') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Manage Tree Mappings </p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('users')}}" class="nav-link <?php echo ($active == 'users') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>Users </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('treeView')}}" class="nav-link <?php echo ($active == 'tree-view') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-sitemap"></i>
								<p>Tree View</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('reports')}}" class="nav-link <?php echo ($active == 'reports') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-file-excel"></i>
								<p>Report</p>
							</a>
						</li>
						@endif

						@if (Auth::user()->emp_type=="agent")

						<li class="nav-item">
							<a href="{{route('treeView')}}" class="nav-link <?php echo ($active == 'tree-view') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-sitemap"></i>
								<p>Tree View</p>
							</a>
						</li>

						@endif
					</ul>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">

	</div>