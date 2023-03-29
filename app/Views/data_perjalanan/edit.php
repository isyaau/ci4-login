<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perjalanan</h1>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Form -->
        <div class="col-xl3 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="p-0 font-weight-bold text-primary">Edit Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5>Periksa Entrian Form</h5>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form class="row g-3" action="/data-perjalanan/update/<?= $dataperjalanan['id_perjalanan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_perjalanan" value="<?= (old('id_perjalanan')) ? old('id_perjalanan') : $dataperjalanan['id_perjalanan']; ?>">
                        <div class="col-12">
                            <label for="asal" class="form-label">Kota Asal</label>
                            <input type="text" name="asal" value="<?= (old('asal')) ? old('asal') : $dataperjalanan['asal']; ?>" class="form-control" id="inputAddress" placeholder="Kota Asal">
                        </div>
                        <div class="col-12">
                            <label for="tujuan" class="form-label">Kota Tujuan</label>
                            <input type="text" name="tujuan" value="<?= (old('tujuan')) ? old('tujuan') : $dataperjalanan['tujuan']; ?>" class="form-control" id="inputAddress" placeholder="Kota Tujuan">
                        </div>
                        <div class="col-12">
                            <label for="jarak" class="form-label">Jarak ( dalam KM )</label>
                            <input type="text" name="jarak" value="<?= (old('jarak')) ? old('jarak') : $dataperjalanan['jarak']; ?>" class="form-control" id="inputAddress" placeholder="Jarak (KM)">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/data-perjalanan" class="btn btn-warning  float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>