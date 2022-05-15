<?= $this->extend('auth/template'); ?>

<?= $this->section('login-content'); ?>
<div class="container">
    <div class="text-center">'
        <div class="mt-2">
            <img src="/assets/sman1pademawu.png" alt="" style="width: 100px;">
        </div>
        <h2 class="h2 text-gray-900 mb-4">Evoting <strong>SMAN 1 PADEMAWU</strong></h2>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-4">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Login <strong>Admin</strong></h1>
                                </div>

                                <?php if (session()->getFlashdata('pesan_hijau')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan_hijau'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <?php if (session()->getFlashdata('pesan_merah')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan_merah'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>

                                <form action="<?= site_url('auth/cek_login'); ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>