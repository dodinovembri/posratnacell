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

    <?= $this->include('components/header') ?>

    <div class="adminuiux-wrap">
        <main class="adminuiux-content">


            <div class="card bg-none mb-3 mb-lg-4">
                <div class="card-body pb-0">
                    <div class="row gx-3 gx-lg-4">
                        <form action="<?= base_url('product/store_fee_fixed') ?>" method="post" enctype="multipart/form-data" class="form-harga">
                            <div class="col-12">
                                <h6 class="mb-3">Buat Produk</h6>
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
                                    <input class="form-control format-rupiah-base" placeholder="Harga Modal" type="text" name="base_price" required>
                                    <label>Harga Modal</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control format-rupiah-selling" placeholder="Harga Jual" type="text" name="selling_price" required>
                                    <label>Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="form-floating ">
                                        <input class="form-control" placeholder="Stok Melati" type="number" name="qty_melati">
                                        <label>Stok Melati</label>
                                    </div>
                                    <div class="form-floating ">
                                        <input class="form-control" placeholder="Stok Srengseng" type="number" name="qty_srengseng">
                                        <label>Stok Srengseng</label>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rupiahBase = document.querySelectorAll('.format-rupiah-base');
            const rupiahSelling = document.querySelectorAll('.format-rupiah-selling');

            // Format rupiah saat ketik
            rupiahBase.forEach(function(input) {
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
                    this.value = rupiah ? 'Rp ' + rupiah : '';
                });
            });

            // Format rupiah saat ketik
            rupiahSelling.forEach(function(input) {
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
                    this.value = rupiah ? 'Rp ' + rupiah : '';
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

                form.addEventListener('submit', function(e) {
                    const input = form.querySelector('.format-rupiah-selling');
                    if (input) {
                        // Hapus Rp, titik, koma sebelum submit
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }
                });
            });
        });
    </script>
</body>

</html>