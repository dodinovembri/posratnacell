<!DOCTYPE html>
<html lang="en">
<!-- dir="rtl"-->

<head>
	<!-- Required meta tags  -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

	<meta name="application-name" content="RatnaCell">
	<meta name="apple-mobile-web-app-title" content="RatnaCell">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<link rel="apple-touch-icon" href="<?= base_url('img/logo-512.png') ?>">

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Ratna Cellular And Collections</title>
	<meta name="description" content="Ratna Cellular And Collections">
	<link rel="icon" type="image/png" href="<?= base_url('img/favicon.png') ?>">
	<link href="<?= base_url('css/fonts.css') ?>" rel="stylesheet">

	<style>
		:root {
			--adminuiux-content-font: "Open Sans", serif;
			--adminuiux-content-font-weight: 400;
			--adminuiux-title-font: "Poppins", serif;
			--adminuiux-title-font-weight: 600;
		}
	</style>

	<script defer src="<?= base_url('js/app.js') ?>"></script>
	<link href="<?= base_url('css/app.css') ?>" rel="stylesheet">

</head>

<body class="main-bg main-bg-opac main-bg-blur roundedui adminuiux-header-standard adminuiux-sidebar-standard adminuiux-mobile-footer-fill-theme adminuiux-header-transparent theme-pista bg-r-gradient adminuiux-sidebar-fill-none scrollup" data-theme="theme-pista" data-sidebarfill="adminuiux-sidebar-fill-none" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard" data-headerlayout="adminuiux-header-standard"
	data-headerfill="adminuiux-header-transparent" data-bggradient="bg-r-gradient" style="">

	<?= $this->include('components/header') ?>

	<div class="adminuiux-wrap">
		<!-- Standard sidebar -->
		<main class="adminuiux-content">
			<!-- body content of pages -->

			<!-- content -->
			<div class="container mt-3 mt-lg-4 mt-xl-5" id="main-content">
				<div class="row gx-3">

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('sales') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PENJUALAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('purchase') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PEMBELIAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('expense') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PENGELUARAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('income') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PEMASUKAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('cash') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>UANG CASH</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('balance') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>SALDO APP</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="#" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>LAPORAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('product') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PRODUK</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('adjustment') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>PENYESUAIAN</p>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="col-6 col-sm-6 col-lg-4 mb-3">
						<a href="<?= base_url('stock') ?>" class="card adminuiux-card shadow-sm style-none">
							<div class="card-body">
								<div class="row gx-3">
									<div class="col">
										<p>UPDATE STOK</p>
									</div>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
		</main>
	</div>

	<!-- Footer -->
	<footer class="adminuiux-footer mt-auto">
		<div class="container-fluid text-center">
			<span class="small">Copyright @2025 Ratna Cellular And Collections</span>
		</div>
	</footer>
</body>

</html>