<header class="adminuiux-header">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container-fluid">
			<!-- main sidebar toggle -->
			<button class="btn btn-link btn-square sidebar-toggler" type="button" onclick="initSidebar()">
				<i class="sidebar-svg" data-feather="menu"></i>
			</button>
			<!-- logo -->
			<a class="navbar-brand" href="#">
				<img data-bs-img="light" src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/img/logo-light.svg" alt="" class="avatar avatar-30">
				<img data-bs-img="dark" src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/img/logo.svg" alt="" class="avatar avatar-30">
				<div class="d-block ps-2">
					<h6 class="fs-6 mb-0">Ratna<span class="fs-6"> Cellular</span></h6>
					<p class="company-tagline">And Collections</p>
				</div>
			</a>

			<!-- right icons button -->
			<div class="ms-auto">
				<!-- fullscreen toggle -->
				<button class="btn btn-link btn-square btn-icon btn-link-header" type="button" data-bs-toggle="modal" data-bs-target="#searchmodalfull">
					<i data-feather="search"></i>
				</button>
				<!-- dark mode -->
				<button class="btn btn-link btn-square btnsunmoon btn-link-header" id="btn-layout-modes-dark-page">
					<i class="sun mx-auto" data-feather="sun"></i>
					<i class="moon mx-auto" data-feather="moon"></i>
				</button>
				<!-- notification dropdown -->
				<button class="btn btn-link btn-square btn-icon btn-link-header position-relative" data-bs-toggle="offcanvas" data-bs-target="#view-notification">
					<i data-feather="bell"></i>
					<!-- <span class="position-absolute top-0 end-0 badge rounded-pill bg-danger p-1">
              <small>9+</small>
              <span class="visually-hidden">unread messages</span>
            </span> -->
				</button>
			</div>
		</div>
	</nav>

</header>