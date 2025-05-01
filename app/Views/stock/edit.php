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

    <?= $this->include('components/header') ?>

    <div class="adminuiux-wrap">
        <main class="adminuiux-content">


            <div class="card bg-none mb-3 mb-lg-4">
                <div class="card-body pb-0">
                    <div class="row gx-3 gx-lg-4">
                        <form id="myForm" action="<?= base_url('product/update/' . $product->id) ?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <h6 class="mb-3">Edit Produk</h6>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Kode Produk" type="text" name="code" value="<?= $product->code ?>" required>
                                    <label>Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Nama Produk" type="text" name="name" value="<?= $product->name ?>" required>
                                    <label>Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Harga Modal" type="number" name="base_price" value="<?= $product->base_price ?>" required>
                                    <label>Harga Modal</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Harga Jual" type="number" name="selling_price" value="<?= $product->selling_price ?>" required>
                                    <label>Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="form-floating ">
                                        <input class="form-control" placeholder="Stok Melati" type="number" name="qty_melati" value="<?= $product->qty_melati ?>">
                                        <label>Stok Melati</label>
                                    </div>
                                    <div class="form-floating ">
                                        <input class="form-control" placeholder="Stok Srengseng" type="number" name="qty_srengseng" value="<?= $product->qty_srengseng ?>">
                                        <label>Stok Srengseng</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Harga Jual" type="number" name="qty_alert" value="<?= $product->qty_alert ?>" required>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthChange": false
            });
        });

        document.getElementById('myForm').addEventListener('submit', function(event) {
            var submitBtn = document.getElementById('submitBtn');

            // Disable submit button to prevent multiple clicks
            submitBtn.disabled = true;

            // Optionally, you can change button text to show it's processing
            submitBtn.innerHTML = "Processing...";

            // Form akan tetap dikirimkan seperti biasa
        });
    </script>

</body>

</html>