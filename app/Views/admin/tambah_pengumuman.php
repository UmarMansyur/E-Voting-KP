<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <form action="<?= site_url('admin/save_pengumuman'); ?>" method="POST">
                <!-- Nested Row within Card Body -->
                <div class="form-group">
                    <label for="judul_p">Judul</label>
                    <input type="text" name="judul_p" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi_p" id="summernote" cols="30" rows="10" required></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="jam_mulai">Mulai Pada Jam</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="tgl_tutup">Tanggal Tutup</label>
                            <input type="date" name="tgl_tutup" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="jam_tutup">Tutup Pada Jam</label>
                            <input type="time" name="jam_tutup" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>