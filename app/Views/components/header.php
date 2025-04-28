<header class="adminuiux-header">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container-fluid">
			<!-- logo -->
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>">
				<img data-bs-img="light" src="<?= base_url('img/logo-light.svg') ?>" alt="" class="avatar avatar-30">
				<img data-bs-img="dark" src="<?= base_url('img/logo.svg') ?>" alt="" class="avatar avatar-30">
				<div class="d-block ps-2">
					<h6 class="fs-6 mb-0">Ratna<span class="fs-6"> Cellular</span></h6>
					<p class="company-tagline">And Collections</p>
				</div>
			</a>

			<!-- right icons button -->
			<div class="ms-auto">
				<!-- dark mode -->
				<button class="btn btn-link btn-square btnsunmoon btn-link-header" id="btn-layout-modes-dark-page">
					<i class="sun mx-auto" data-feather="sun"></i>
					<i class="moon mx-auto" data-feather="moon"></i>
				</button>
				<!-- notification dropdown -->
				<button class="btn btn-link btn-square btn-icon btn-link-header position-relative" data-bs-toggle="offcanvas" data-bs-target="#view-notification">
					<i data-feather="bell"></i>
				</button>
				<!-- notification dropdown -->
				<a href="<?= base_url('logout') ?>"><button class="btn btn-link btn-square btn-icon btn-link-header position-relative">
						<i data-feather="log-out"></i>
					</button>
				</a>
			</div>
		</div>
	</nav>

</header>