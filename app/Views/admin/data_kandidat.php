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
    <div class="mb-2 mt-2">
        <a href="<?= site_url('admin/tambah_kandidat'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Data Kandidat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Urut</th>
                            <th>Nama</th>
                            <th>Visi Misi</th>
                            <th>Priode</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>No Urut</th>
                            <th>Nama</th>
                            <th>Visi Misi</th>
                            <th>Priode</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $n = 1 ?>
                        <?php foreach ($kandidat as $k) : ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= $k['no_urut']; ?></td>
                                <td><?= $k['nama_kandidat']; ?></td>
                                <td><?= $k['visi_misi']; ?></td>
                                <td><?= $k['priode'] ?></td>
                                <td>
                                    <img src="/assets/fotokandidat/<?= $k['gambar_kandidat']; ?>" alt="" style="width: 200px;">
                                </td>
                                <td>
                                    <div class="mb-2">
                                        <a href="<?= site_url('admin/ubah_kandidat'); ?>/<?= $k['id_kandidat']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    </div>
                                    <form action="<?= site_url('admin/hapus_kandidat'); ?>/<?= $k['id_kandidat']; ?>" method="POST">
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