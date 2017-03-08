<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="{{{ asset('assets/img/user-13.jpg') }}}" alt="" /></a>
						</div>
						<div class="info">
							{{{ Auth::User()->firstname }}}&nbsp;{{{ Auth::User()->lastname }}}
							<small>{{{ Auth::User()->usertype }}}</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li {{{ (Request::is('dashboard') ? 'class=active' : '') }}}><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
					<li {{{ (Request::is('comparedata') ? 'class=active' : '') }}}><a href="/comparedata"><i class="fa fa-sliders"></i> <span>Compare Data</span></a></li>
					<li {{{ (Request::is('historicaldata') ? 'class=active' : '') }}}><a href="/historicaldata"><i class="fa fa-history"></i> <span>Historical Data</span></a></li>
					<li {{{ (Request::is('historicaldataall') ? 'class=active' : '') }}}><a href="/historicaldataall"><i class="fa fa-info"></i> <span>Historical Data all</span></a></li>
                    <li {{{ (Request::is('devices') ? 'class=active' : '') }}}><a href="/devices"><i class="fa fa-laptop"></i> <span>Devices</span></a></li>
					<li {{{ (Request::is('emergencies') ? 'class=active' : '') }}}><a href="/emergencies"><i class="fa fa-life-saver"></i> <span>Emergency Contacts</span></a></li>
					<li {{{ (Request::is('updateprofilelogged') ? 'class=active' : '') }}}><a href="/updateprofilelogged"><i class="fa fa-user"></i> <span>Your Profile</span></a></li>
					@if (Auth::User()->isManager())					
					<li {{{ (Request::is('users') ? 'class=active' : '') }}}><a href="/users"><i class="fa fa-group"></i> <span>Users</span></a></li>	
					@endif
					
					<li class="nav-header"></li>
					<li {{{ (Request::is('users.updatepassword') ? 'class=active' : '') }}}><a href="/password"><i class="fa fa-gear "></i> <span>Settings</span></a></li>	
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
