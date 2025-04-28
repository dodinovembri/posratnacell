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
</head>

<body class="main-bg main-bg-opac main-bg-blur roundedui adminuiux-header-standard adminuiux-sidebar-standard adminuiux-mobile-footer-fill-theme adminuiux-header-transparent theme-pista bg-r-gradient adminuiux-sidebar-fill-none scrollup" data-theme="theme-pista" data-sidebarfill="adminuiux-sidebar-fill-none" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard"
    data-headerlayout="adminuiux-header-standard" data-headerfill="adminuiux-header-transparent" data-bggradient="bg-r-gradient" style="--adminuiux-main-bg: url(../../assets/img/ecommerce/image-4.html);">
    <!-- page loader -->
    <!-- Pageloader -->
    <div class="pageloader">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center h-100 pb-ios">
                <div class="col-12 mb-auto pt-4"></div>
                <div class="col-auto">
                    <img src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/img/logo.svg" alt="" class="height-80 mb-3">
                    <p class="h2 mb-0 text-theme-accent-1">Ratna Cellular</p>
                    <p class="display-3 text-theme-1 fw-bold mb-4">And Collections</p>
                    <div class="loader5 mb-2 mx-auto"></div>
                </div>
                <div class="col-12 mt-auto pb-4">
                    <p class="small text-secondary">Please wait we are preparing awesome things...</p>
                </div>
            </div>
        </div>
    </div> <!-- main content -->
    <!-- standard header -->
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

    <div class="adminuiux-wrap z-index-0 position-relative">
        <main class="adminuiux-content">
            <!--Page body-->
            <div class="container-fluid">
                <div class="row gx-3 align-items-center justify-content-center py-3 mt-auto z-index-1 height-dynamic" style="--h-dynamic: calc(100vh - 120px)">
                    <div class="col login-box maxwidth-400">
                        <div class="mb-4">

                        </div>
                        <form action="<?= base_url('auth') ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailadd" placeholder="Enter email address" name="email" required>
                                <label for="emailadd">Email Address</label>
                            </div>
                            <div class="position-relative">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="passwd" placeholder="Enter your password" type="password" name="password" required>
                                    <label for="passwd">Password</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-lg btn-theme w-100 mb-4">Login</button>
                        </form>
                        <br>


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

    <!-- Page Level js -->
    <script src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/js/ecommerce/ecommerce-auth.js"></script>
</body>


<!-- Mirrored from www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/ecommerce-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Apr 2025 07:52:55 GMT -->

</html>