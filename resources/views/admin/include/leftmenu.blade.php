<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<li><a><i class="fa fa-home"></i> Masters <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					@php $active= collect(request()->segments())->last() @endphp
					@php $active= request()->segment(2); @endphp
					<li><a href="{{route('admin.categories')}}" <?php echo ($active == 'categories') ? 'active' : ''; ?>>Categories</a></li>
					<li><a href="{{route('admin.subcategories')}}" <?php echo ($active == 'subcategories') ? 'active' : ''; ?>>Subcategories</a></li>
					<li><a href="{{route('admin.banners')}}" <?php echo ($active == 'banners') ? 'active' : ''; ?>>Banners</a></li>
					<li><a href="{{route('admin.users')}}" <?php echo ($active == 'users') ? 'active' : ''; ?>>Users</a></li>
				</ul>
			</li>
			<li><a><i class="fa fa-shopping-cart"></i> Products Master <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{route('admin.products')}}" <?php echo ($active == 'categories') ? 'active' : ''; ?>>Product List</a></li>

				</ul>
			</li>

		</ul>
	</div>


</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('logout') }}">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	</a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						@if (Auth::user()->is_admin=="1")
						{{ Auth::user()->name }}
						@endif

						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /top navigation -->