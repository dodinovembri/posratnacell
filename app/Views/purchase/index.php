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

            <div class="card bg-none mb-3 mb-lg-4">
                <div class="card-body pb-0">
                    <div class="row gx-3 gx-lg-4">
                        <div class="col-12">
                            <h6 class="mb-3">Buat Pembelian</h6>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="keyword">
                                <label>Cari Produk...</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="container mt-3 mt-lg-4 mt-xl-5" id="main-content">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Waktu</th>
                            <th style="text-align: left;">Kode</th>
                            <th style="text-align: left;">Nama</th>
                            <th style="text-align: left;">Harga Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($purchases as $key => $value) { ?>
                            <tr>
                                <td style="text-align: left;"><?= date('H:i:s', strtotime($value->date)); ?></td>
                                <td style="text-align: left;"><?= $value->product_code ?></td>
                                <td style="text-align: left;"><?= $value->name ?></td>
                                <td style="text-align: left;"><?= $value->amount ?></td>
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

    <script>
        $(document).ready(function() {
            $('#keyword, #database').on('keyup change', function() {
                let keyword = $('#keyword').val();
                let database = $('#database').val();

                // Cegah search kalau input kosong
                if (keyword.length < 2) {
                    $('#result').html('');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("purchase/search/ajax_result") ?>',
                    type: 'POST',
                    data: {
                        keyword: keyword,
                        database: database
                    },
                    success: function(response) {
                        $('#result').html(response);
                    }
                });
            });
        });
    
		$('#myTable').DataTable({
			"lengthChange": false,
			paging: false,
            ordering: false,
            searching: false,
			columnDefs: [{
				targets: 3, // kolom ke-2 (indeks dimulai dari 0)
				render: function(data, type, row) {
					return formatRupiah(data, 'Rp ');
				}
			}]
		});

		function formatRupiah(angka, prefix) {
			let number_string = angka.toString().replace(/[^,\d]/g, ''),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				let separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix + rupiah;
		}
	</script>

</body>

</html>