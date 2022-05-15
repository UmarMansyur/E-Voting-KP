<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
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