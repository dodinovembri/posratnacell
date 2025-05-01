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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body class="main-bg main-bg-opac main-bg-blur roundedui adminuiux-header-standard adminuiux-sidebar-standard adminuiux-mobile-footer-fill-theme adminuiux-header-transparent theme-pista bg-r-gradient adminuiux-sidebar-fill-none scrollup" data-theme="theme-pista" data-sidebarfill="adminuiux-sidebar-fill-none" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard"
    data-headerlayout="adminuiux-header-standard" data-headerfill="adminuiux-header-transparent" data-bggradient="bg-r-gradient" style="">

    <?= $this->include('components/header') ?>

    <div class="adminuiux-wrap">
        <main class="adminuiux-content">


            <form id="myForm" action="<?= base_url('purchase/store') ?>" method="post" enctype="multipart/form-data" class="form-harga">
                <div class="card bg-none mb-3 mb-lg-4">
                    <div class="card-body pb-0">
                        <div class="row gx-3 gx-lg-4">
                            <div class="col-12">
                                <h6 class="mb-3">Buat Pembelian</h6>
                            </div>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="code" value="<?= $product->code ?>" readonly>
                                    <label>Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="name" value="<?= $product->name ?>" readonly>
                                    <label>Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="qty" value="<?= $product->qty ?>" readonly>
                                    <label>Stok</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-none mb-3 mb-lg-4">
                    <div class="card-body pb-0">
                        <div class="row gx-3 gx-lg-4">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" placeholder="Quantity" type="number" min="1" name="qty_order" value="1" required>
                                    <label>Jumlah Beli</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control format-rupiah-base" type="text" name="base_price" required>
                                    <label>Harga Beli Satuan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <button class="form-control" type="submit" id="submitBtn">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <footer class="adminuiux-footer mt-auto">
        <div class="container-fluid text-center">
            <span class="small">Copyright @2025 Ratna Cellular And Collections</span>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formatRupiahBase = document.querySelectorAll('.format-rupiah-base');

            // Format rupiah saat ketik
            formatRupiahBase.forEach(function(input) {
                input.addEventListener('keyup', function(e) {
                    let angka = this.value.replace(/[^,\d]/g, '').toString();
                    let split = angka.split(',');
                    let sisa = split[0].length % 3;
                    let rupiah = split[0].substr(0, sisa);
                    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        let separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                    this.value = rupiah ? '' + rupiah : '';
                });
            });

            // Bersihkan format sebelum form submit
            const forms = document.querySelectorAll('.form-harga');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    const input = form.querySelector('.format-rupiah-base');
                    if (input) {
                        // Hapus Rp, titik, koma sebelum submit
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }
                });
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