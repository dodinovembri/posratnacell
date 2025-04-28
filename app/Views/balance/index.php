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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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


            <!-- content -->
            <div class="container mt-3 mt-lg-4 mt-xl-5" id="main-content">
                <h4><?= is_null($balance_desc) ? '' : $balance_desc; ?></h4>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Aplikasi</th>
                            <th style="text-align: left;">Saldo Awal</th>
                            <th style="text-align: left;">Saldo Akhir</th>
                            <th style="text-align: left;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($balances as $key => $value) { ?>
                            <tr>
                                <td style="text-align: left;"><?= $value->app_name ?></td>
                                <td style="text-align: left;"><?= $value->balance_open ?></td>
                                <td style="text-align: left;"><?= $value->balance_close ?></td>
                                <td>
                                    <!-- Tombol untuk memicu modal -->
                                    <button type="button" class="btn btn-primary openModalBtn" data-id="<?= $value->id ?>" data-warehouse="<?= is_null($warehouse) ? session()->get('warehouse') : $warehouse; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value->id; ?>">
                                        Edit
                                    </button>

                                    <!-- Modal -->

                                    <form action="<?= base_url('balance/update_balance/' . $value->id) ?>" method="post" enctype="multipart/form-data" class="form-harga">
                                        <div class="modal fade" id="exampleModal<?= $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Saldo <?= $value->app_name; ?> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $value->id; ?>">
                                                        <?php if (!is_null($warehouse)) { ?>
                                                            <input type="hidden" name="warehouse" value="<?= $warehouse; ?>">
                                                        <?php } ?>
                                                        <div class="col-12">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" type="text" name="balance_open" value="<?= 'Rp ' . number_format($value->balance_open, 0, ',', '.'); ?>" readonly>
                                                                <label>Saldo <?= $value->app_name; ?> Open</label>
                                                            </div>
                                                        </div>
                                                        <?php if ($value->app_name != "Livin Merchant") { ?>


                                                            <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="radio" value="plus" id="radioC1" name="indicator_adjust">
                                                                    <label class="form-check-label" for="radioC1"> Tambah Saldo </label>
                                                                </div>
                                                                <div class="form-check mb-3" style="--adminuiux-theme-1:var(--adminuiux-theme-accent-1)">
                                                                    <input class="form-check-input" type="radio" value="minus" id="radioC1" name="indicator_adjust">
                                                                    <label class="form-check-label" for="radioC1"> Kurangi Saldo </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-floating mb-3">
                                                                    <input class="form-control" type="text" name="adjust_description">
                                                                    <label>Keterangan Sumber Uang</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-floating mb-3">
                                                                    <input class="form-control format-rupiah-adjustment" type="text" name="adjust_amount">
                                                                    <label>Nominal Tambah/ Kurangi Saldo <?= $value->app_name; ?></label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="col-12">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control format-rupiah" type="text" id="balance_close" name="balance_close" value="<?= $value->balance_close; ?>">
                                                                <label>Saldo <?= $value->app_name; ?> Close</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    <div id="content-adjust-<?= $value->id; ?>"></div>
                                                </div>
                                            </div>
                                    </form>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </main>
    </div>

    <footer class="adminuiux-footer mt-auto">
        <div class="container-fluid text-center">
            <span class="small">Copyright @2025 Ratna Cellular And Collections</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#myTable').DataTable({
            "lengthChange": false,
            paging: false,
            ordering: false,
            info: false,
            searching: false,
            columnDefs: [{
                targets: [1, 2], // kolom ke-2 (indeks dimulai dari 0)
                render: function(data, type, row) {
                    return formatRupiah(data, '');
                }
            }]
        });

        function formatRupiah(angka, prefix) {
            let sign = '';

            angka = angka.toString();

            if (angka.startsWith('-')) {
                sign = '-'; // Simpan tanda minus
                angka = angka.substr(1); // Buang tanda minus buat formatting
            }

            let number_string = angka.replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return (sign ? sign : '') + prefix + rupiah;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const rupiahInputs = document.querySelectorAll('.format-rupiah');
            const rupiahAdjustment = document.querySelectorAll('.format-rupiah-adjustment');

            // Format rupiah saat ketik
            rupiahInputs.forEach(function(input) {
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
            rupiahAdjustment.forEach(function(input) {
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
                    const input = form.querySelector('.format-rupiah');
                    if (input) {
                        // Hapus Rp, titik, koma sebelum submit
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }
                });

                form.addEventListener('submit', function(e) {
                    const input = form.querySelector('.format-rupiah-adjustment');
                    if (input) {
                        // Hapus Rp, titik, koma sebelum submit
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.openModalBtn').on('click', function() {
                var id = $(this).data('id');
                var warehouse = $(this).data('warehouse'); // ambil warehouse juga

                $.ajax({
                    url: '<?= base_url('balance/get_data_by_id') ?>', // Ganti dengan controller kamu
                    method: 'POST',
                    data: {
                        id: id,
                        warehouse: warehouse // kirim juga ke server
                    },
                    success: function(response) {
                        $('#content-adjust-' + id).html(response).hide().fadeIn();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>