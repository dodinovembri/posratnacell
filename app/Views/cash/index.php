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
                <h4><?= is_null($desc_cash) ? '' : $desc_cash; ?></h4>
                <form
                    <?php
                    if (session()->get('role') == "owner") {
                        if (is_null($cash_open)) { ?>
                    action="<?= base_url('cash/store_cash_open') ?>"
                    <?php } else { ?>
                    action="<?= base_url('cash/update_cash_open/' . $cash_open->id) ?>"
                    <?php }
                    } else {
                        if (is_null($cash_close)) { ?>
                    action="<?= base_url('cash/store_cash_close') ?>"
                    <?php } else { ?>
                    action="<?= base_url('cash/update_cash_close/' . $cash_close->id) ?>"
                    <?php }
                    } ?> method="post" enctype="multipart/form-data">
                    <input type="hidden" name="cash_session" value="<?= is_null($cash_session) ? '' : $cash_session; ?>">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Pecahan</th>
                                <th style="text-align: left;">Jumlah Open</th>
                                <th style="text-align: left;">Jumlah Close</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;">100 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_100ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'100ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_100ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'100ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">50 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_50ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'50ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_50ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'50ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">20 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_20ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'20ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_20ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'20ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">10 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_10ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'10ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_10ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'10ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">5 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_5ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'5ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_5ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'5ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">2 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_2ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'2ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_2ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'2ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">1 Ribu</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_1ribu" value="<?= is_null($cash_open) ? '' : $cash_open->{'1ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_1ribu" value="<?= is_null($cash_close) ? '' : $cash_close->{'1ribu'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">500 Perak</td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_open_500perak" value="<?= is_null($cash_open) ? '' : $cash_open->{'500perak'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        required
                                        <?php } else { ?>
                                        disabled
                                        <?php } ?>>
                                </td>
                                <td style="text-align: left;">
                                    <input class="form-control" type="number" min="0" name="cash_close_500perak" value="<?= is_null($cash_close) ? '' : $cash_close->{'500perak'}; ?>" <?php if (session()->get('role') == "owner") { ?>
                                        disabled
                                        <?php } else { ?>
                                        required
                                        <?php } ?>>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <button class="form-control" type="submit">SIMPAN</button>
                        </div>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <footer class="adminuiux-footer mt-auto">
        <div class="container-fluid text-center">
            <span class="small">Copyright @2025 Ratna Cellular And Collections</span>
        </div>
    </footer>
    <script>
        $('#myTable').DataTable({
            "lengthChange": false,
            paging: false,
            ordering: false,
            info: false,
            searching: false
        });
    </script>

    <!-- Page Level js -->
    <script src="https://www.adminuiux.com/adminuiux/ecommerce-mobile-uiux/assets/js/ecommerce/ecommerce-products.js"></script>

</body>

</html>