<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/login_siswa/fonts/icomoon/style.css">
          
    <link rel="stylesheet" href="<?= base_url(); ?>/login_siswa/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/login_siswa/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/login_siswa/css/style.css">

    <title><?= $tittle; ?></title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>/login_siswa/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3><strong>Login</strong></h3>
                                <?php if (session()->getFlashdata('pesan_merah')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Gagal!</strong> <?= session()->getFlashdata('pesan_merah'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <?php if (session()->getFlashdata('pesan_hijau')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan_hijau'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <p class="mb-4">Selamat datang di Evoting <strong>SMAN 1 PADEMAWU</strong> Silahkan Login untuk memilih</p>
                            </div>
                            <form action="<?= site_url('auth/cek_loginSiswa'); ?>" method="POST">
                                <div class="form-group first">
                                    <label for="username">Nis</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/login_siswa/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>/login_siswa/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/login_siswa/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/login_siswa/js/main.js"></script>
</body>

</html>