<?= $this->extend('siswa/template_siswa'); ?>

<?= $this->section('page-siswa'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan_hijau')) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan_hijau'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <?php if (session()->getFlashdata('pesan_merah')) : ?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>Gagal!</strong> <?= session()->getFlashdata('pesan_merah'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="main-body mt-5">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3 mt-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= ($siswa->jenis_kelamin) == 'L' ? 'https://bootdey.com/img/Content/avatar/avatar7.png' : 'https://stickershop.line-scdn.net/stickershop/v1/product/1417149/LINEStorePC/main.png;compress=true'; ?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><strong><?= $siswa->nama_siswa; ?></strong></h4>
                                <p class="text-secondary mb-1">NIS : <?= $siswa->nis_siswa; ?></p>
                                <p class="text-muted font-size-sm">KELAS : <?= $siswa->kelas; ?></p>
                                <?php if ($siswa->status_memilih == 'sudah') { ?>
                                    <strong>
                                        <p class="text-success">Sudah Memilih</p>
                                    </strong>
                                <?php } ?>
                                <?php if ($siswa->status_memilih == 'belum') { ?>
                                    <a href="<?= site_url('siswa/voting'); ?>" class="btn btn-danger">Belum Memilih</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="card mb-5 py-4 shadow">
                    <div class="card-body mb-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Lengkap</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $siswa->nama_siswa; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">NIS</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $siswa->nis_siswa; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kelas</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $siswa->kelas; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Priode</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $siswa->tahun; ?>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="card mt-4 border-left-primary">
        <div class="card-body">
            <h5>Selamat datang di Evoting <strong>SMAN 1 PADEMAWU</strong></h5>
            <p>e-voting berasal dari kata electronic voting yang mengacu pada penggunaan teknologi informasi pada pelaksanaan pemungutan suara. <a target="_blank" href="https://id.wikipedia.org/wiki/Pemungutan_suara_elektronik">wikipedia</a></p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>