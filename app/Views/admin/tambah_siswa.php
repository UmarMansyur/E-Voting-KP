<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-2">
                        <form action="<?= site_url('admin/simpan_siswa'); ?>" method="POST" class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nis_siswa">NIS</label>
                                    <input type="text" name="nis_siswa" class="form-control <?= ($validation->hasError('nis_siswa')) ? 'is-invalid' : ''; ?>" id="exampleFirstName" placeholder="Nis Siswa" value="<?= old('nis_siswa'); ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nis_siswa'); ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nama_siswa">Nama</label>
                                    <input type="text" name="nama_siswa" class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ''; ?>" id="exampleLastName" placeholder="Nama Siswa" value="<?= old('nama_siswa'); ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nama_siswa'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Kelas</label>
                                    <select class="selectpicker form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" name="kelas" data-container="body" data-live-search="true" title="Pilih Kelas">
                                        <?php if (old('kelas') == true) : ?>
                                            <optgroup label="pilihan sebelumnya">
                                                <option selected value="<?= old('kelas'); ?>"><?= old('kelas'); ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k['nama_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('kelas'); ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select class="selectpicker form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" name="jenis_kelamin" data-container="body" data-live-search="true" title="Pilih JK">
                                        <?php if (old('jenis_kelamin') == true) : ?>
                                            <optgroup label="pilihan sebelumnya">
                                                <option selected value="<?= old('jenis_kelamin'); ?>"><?= old('jenis_kelamin'); ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('jenis_kelamin'); ?></div>
                                </div>
                                <input type="hidden" name="status_memilih" id="status_memilih" value="belum">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Status Aktif</label>
                                    <select class="selectpicker form-control <?= ($validation->hasError('status_aktif')) ? 'is-invalid' : ''; ?>" name="status_aktif" data-container="body" data-live-search="true" title="Pilih JK">
                                        <?php if (old('status_aktif') == true) : ?>
                                            <optgroup label="pilihan sebelumnya">
                                                <option selected value="<?= old('status_aktif'); ?>"><?= old('status_aktif'); ?></option>
                                            </optgroup>
                                        <?php endif; ?>
                                        <option selected value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <input type="hidden" name="level" value="2">
                                <div class="col-sm-6">
                                    <label for="password">Password Login</label>
                                    <input type="text" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" value="<?= $getPass; ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="date" name="tahun" class="form-control" id="datePicker">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>