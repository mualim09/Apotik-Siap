<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <a href="<?= route_to('obat.index') ?>" class="btn btn-success mr-2 mb-3"><i class="fas fa-arrow-left"></i></a>
    <?php if (!empty(session()->getFlashData('errors'))) :
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Cek kembali input data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Obat</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= route_to('obat.store') ?>">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nama Obat :</label>
                            <input name="nama" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['nama']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['nama'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['nama'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Berat :</label>

                            <div class="input-group">
                                <input name="berat" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['berat']) ? 'is-invalid' : 'valid' ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Miligram (mg)</span>
                                </div>
                                <?php if (!empty(session()->getFlashData('errors')['berat'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashData('errors')['berat'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty(session()->getFlashData('errors')['berat'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['berat'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Kadaluarsa :</label>
                            <input name="tanggal_exp" type="date" class="form-control <?= !empty(session()->getFlashData('errors')['tanggal_exp']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['tanggal_exp'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['tanggal_exp'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Harga :</label>
                            <input name="harga" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['harga']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['harga'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['harga'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Stok :</label>
                            <input name="stok" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['stok']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['stok'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['stok'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori Obat :</label>
                            <select name="kategori" class="custom-select <?= !empty(session()->getFlashData('errors')['kategori']) ? 'is-invalid' : 'valid' ?>" data-live-search="true">
                                <option value="" selected>Pilih Kategori</option>
                                <option value="Vitamin">Vitamin</option>
                                <option value="Obat Sakit Kepala"> Obat Sakit Kepala</option>
                                <option value="Obat Demam">Obat Demam</option>
                            </select>
                            <?php if (!empty(session()->getFlashData('errors')['kategori'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['kategori'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>