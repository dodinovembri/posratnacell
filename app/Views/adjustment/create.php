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

<body class="main-bg main-bg-opac main-bg-blur roundedui adminuiux-header-standard adminuiux-sidebar-standard adminuiux-mobile-footer-fill-theme adminuiux-header-transparent theme-pista bg-r-gradient adminuiux-sidebar-fill-none scrollup" data-theme="theme-pista" data-sidebarfill="adminuiux-sidebar-fill-none" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard"
    data-headerlayout="adminuiux-header-standard" data-headerfill="adminuiux-header-transparent" data-bggradient="bg-r-gradient" style="">

    <header class="adminuiux-header">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container-fluid">
				<!-- logo -->
				<a class="navbar-brand" href="#">
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
				</div>
			</div>
		</nav>

	</header>

    <div class="adminuiux-wrap">
        <main class="adminuiux-content">


            <div class="card bg-none mb-3 mb-lg-4">
                <div class="card-body pb-0">
                    <div class="row gx-3 gx-lg-4">
                        <form action="<?= base_url('adjustment/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <h6 class="mb-3">Buat Produk</h6>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="id" value="<?= $product->id; ?>">
                                    <input class="form-control" type="text" name="code" value="<?= $product->code; ?>" readonly>
                                    <label>Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="name" value="<?= $product->name; ?>" readonly>
                                    <label>Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="number" name="base_price" value="<?= $product->base_price; ?>" required>
                                    <label>Harga Modal</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="number" value="<?= $product->selling_price; ?>" name="selling_price" required>
                                    <label>Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="form-floating ">
                                        <input class="form-control" placeholder="Jumlah Stok" type="number" name="qty" required>
                                        <label>Jumlah Stok</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Harga Jual" type="number" name="qty_alert" required>
                                    <label>Peringatan Stok Habis</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <button class="form-control" type="submit">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer class="adminuiux-footer mt-auto">
        <div class="container-fluid text-center">
            <span class="small">Copyright @2025 Ratna Cellular And Collections</span>
        </div>
    </footer>

</body>

</html>