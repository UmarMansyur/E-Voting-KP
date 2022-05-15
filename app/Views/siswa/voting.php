<?= $this->extend('siswa/template_siswa'); ?>

<?= $this->section('page-siswa'); ?>
<div class="container-fluid mt-4">
    <div class="row">
        <?php foreach ($get_kandidat as $k) : ?>
            <div class="col-sm-4">
                <!-- Collapsable Card Example -->
                <div class="card shadow">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3 bg-success" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-light">CALON <?= $k['no_urut']; ?></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <img class="card-img-top" src="/assets/fotokandidat/<?= $k['gambar_kandidat']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4><strong><?= $k['nama_kandidat']; ?></strong></h4>
                            <?= $k['visi_misi']; ?>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-success mb-4">
                    <div class="text-right">
                        <form action="<?= site_url('siswa/vote'); ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $get_data->id; ?>" id="">
                            <input type="hidden" name="siswa_userid" value="<?= $get_data->siswa_userid; ?>" id="">
                            <input type="hidden" name="status_memilih" value="sudah" id="">
                            <input type="hidden" name="id_pemilih" value="<?= $get_data->id_siswa; ?>" id="">
                            <input type="hidden" name="no_urut" value="<?= $k['no_urut']; ?>">
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>