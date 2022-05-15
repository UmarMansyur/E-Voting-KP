<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $tittle; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>/template/summernote/summernote.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('layout/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 normal">Admin</span>
                                <img class="img-profile rounded-circle" src="/assets/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $tittle; ?></h1>
                        <p><a href="/" class="d-none d-sm-inline-block">Home</a> / <?= $tittle; ?></p>
                    </div>
                </div>

                <div class="container-fluid">
                    <canvas id="myChart"></canvas>
                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class=" sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright SMAN 1 PADEMAWU &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#-copage-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ingin Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Logout jika ingin keluar dari halaman admin dan pastikan data yang anda inputkan sudah <strong class="text-success">Valid</strong> </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= site_url('auth/logout_admin'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js'></script>
    <script>
        let jml_data = <?= $jml_kandidat ?>;
        let kandidat = [];
        let perolehanSuara = [];
        <?php foreach ($nama_kandidat as $key => $value) : ?>
            kandidat.push('<?= $value['nama_kandidat'] ?>');
        <?php endforeach ?>
        <?php foreach ($banyak_suara as $key => $value) : ?>
            perolehanSuara.push('<?= $value['no_urut'] ?>');
        <?php endforeach ?>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: kandidat,
                datasets: [{
                    label: 'Jumlah Perhitungan Suara',
                    data: perolehanSuara,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/template/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/template/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/template/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/template/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>/template/summernote/summernote.min.js"></script>
    <!-- include summernote-ko-KR -->
    <script src="<?= base_url(); ?>/template/summernote/lang/summernote-ko-KR.js"></script>
    <script>
        $('#summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });

        function previewKandidatImg() {
            const gambar_kandidat = document.querySelector('#gambar_kandidat');
            const gambar_kandidatLabel = document.querySelector('.custom-file-label');
            const imgKandidatPreview = document.querySelector('.imgKandidat-preview');

            gambar_kandidatLabel.textContent = gambar_kandidat.files[0].name;

            const fileGambarKandidat = new FileReader();
            fileGambarKandidat.readAsDataURL(gambar_kandidat.files[0]);

            fileGambarKandidat.onload = function(e) {
                imgKandidatPreview.src = e.target.result;
            }
        }

        $(document).ready(function() {
            var now = new Date();
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#datePicker').val(today);
        });
    </script>

</body>

</html>