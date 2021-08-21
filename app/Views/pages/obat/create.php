<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">


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
                            <input name="nama" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Merk :</label>
                            <input name="merk" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Expired :</label>
                            <input name="tanggal_exp" type="date" class="form-control">
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Harga :</label>
                            <input name="harga" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stok :</label>
                            <input name="stok" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>