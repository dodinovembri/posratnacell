<!DOCTYPE html>
<html lang="en">
<!-- dir="rtl"-->

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <meta name="application-name" content="eShopUIUX">
    <meta name="apple-mobile-web-app-title" content="eShopUIUX">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <link rel="apple-touch-icon" href="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/img/logo-512.png">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ratna Cellular And Collections</title>
    <meta name="description" content="Ratna Cellular And Collections">
    <link rel="icon" type="image/png" href="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/img/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&amp;family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <style>
        :root {
            --adminuiux-content-font: "Open Sans", serif;
            --adminuiux-content-font-weight: 400;
            --adminuiux-title-font: "Poppins", serif;
            --adminuiux-title-font-weight: 600;
        }
    </style>
    <script defer src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/js/app.js?e5e60e3925d7f9a7cded"></script>
    <link href="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/css/app.css?e5e60e3925d7f9a7cded" rel="stylesheet">

    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- JS DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body class="main-bg main-bg-opac main-bg-blur roundedui adminuiux-header-standard adminuiux-sidebar-standard adminuiux-mobile-footer-fill-theme adminuiux-header-transparent theme-pista bg-r-gradient adminuiux-sidebar-fill-none scrollup" data-theme="theme-pista" data-sidebarfill="adminuiux-sidebar-fill-none" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard"
    data-headerlayout="adminuiux-header-standard" data-headerfill="adminuiux-header-transparent" data-bggradient="bg-r-gradient" style="">
    <header class="adminuiux-header">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <!-- main sidebar toggle -->
                <button class="btn btn-link btn-square sidebar-toggler" type="button" onclick="initSidebar()">
                    <i class="sidebar-svg" data-feather="menu"></i>
                </button>
                <!-- logo -->
                <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
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
                        <form action="<?= base_url('product/store_non_physical') ?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <h6 class="mb-3">Buat Produk Non Fisik</h6>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Kode Produk" type="text" name="code" required>
                                    <label>Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Nama Produk" type="text" name="name" required>
                                    <label>Nama Produk</label>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthChange": false
            });
        });
    </script>

    <!-- Page Level js -->
    <script src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/js/ecommerce/ecommerce-products.js"></script>

</body>

</html>