<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

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

    <div class="mb-2">
        <a href="<?= site_url('admin/tambah_siswa'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>

        <a href="<?= site_url('admin/import_data'); ?>" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Import Data</span>
        </a>

        <a href="#" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Excel</span>
        </a>

        <a href="#" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
            </span>
            <span class="text">PDF</span>
        </a>

    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>L/P</th>
                            <th>Status Melilih</th>
                            <th>Tahun</th>
                            <th>Keaktifan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>L/P</th>
                            <th>Status Melilih</th>
                            <th>Tahun</th>
                            <th>Keaktifan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $n = 1 ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= $s['nis_siswa']; ?></td>
                                <td><?= $s['nama_siswa']; ?></td>
                                <td><?= $s['kelas'] ?></td>
                                <td><?= $s['jenis_kelamin']; ?></td>
                                <td class="text-<?= ($s['status_memilih']) == 'belum' ? 'danger' : 'success'; ?>"><strong><?= $s['status_memilih']; ?></strong></tds>
                                <td><?= $s['tahun']; ?></td>
                                <td><?= $s['status_aktif']; ?></td>
                                <td class="m-2">
                                    <a href="<?= site_url('admin/ubah_siswa'); ?>/<?= $s['siswa_userid']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <form action="<?= site_url('admin/hapus_siswa'); ?>/<?= $s['siswa_userid']; ?>" method="POST" class="mt-2">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>