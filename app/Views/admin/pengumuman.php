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
            <strong>Gagal!</strong> <?= session()->getFlashdata('pesan_merah'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="mb-2 mt-2">
        <a href="<?= site_url('admin/tambah_pengumuman'); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Pengumuman</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Data Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul</th>
                            <th>diskripsi</th>
                            <th>tanggal mulai</th>
                            <th>tanggal tutup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1 ?>
                        <?php foreach ($pengumuman as $k) : ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= $k['judul_p']; ?></td>
                                <td><?= $k['deskripsi_p']; ?></td>
                                <td><?= $k['tgl_mulai']; ?></td>
                                <td><?= $k['tgl_tutup']; ?></td>
                                <td>
                                    <a href="#" id="EditKelas" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <form action="<?= site_url('admin/hapus_pengumuman'); ?>/<?= $k['id_pengumuman']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('jika salah satu data di hapus. maka akan mempengaruhi isi pilih kelas pada saat tambah data siswa maupun edit')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('admin/simpan_kelas'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-2">
                                <h6>Contoh : <strong>X IPA 1 / X MIPA 2</strong></h6>
                            </div>
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('admin/update_kelas'); ?>" method="POST">
                    <div class="modal-body modal-edit">
                        <div class="form-group">
                            <div class="mb-2">
                                <h6>Contoh : <strong>X IPA 1 / X MIPA 2</strong></h6>
                            </div>
                            <input type="hidden" name="id_kelas" id="id_kelas">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>