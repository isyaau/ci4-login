<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
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
                    <form class="row g-3" action="/data-mobil/update/<?= $datamobil['id_mobil']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_mobil" value="<?= (old('id_mobil')) ? old('id_mobil') : $datamobil['id_mobil']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= (old('gambar')) ? old('gambar') : $datamobil['gambar']; ?>">
                        <div class="col-12">
                            <label for="inputState" class="form-label">Nama Merk</label>
                            <select class="form-select" id="id_merk" name="id_merk">
                                <option selected value="<?= (old('id_merk')) ? old('id_merk') : $joinmobil->getRow('id_merk'); ?>"><?= (old('nama_merk')) ? old('nama_merk') : $joinmobil->getRow('nama_merk'); ?></option>

                                <?php
                                foreach ($merk as $m) : ?>
                                    <option value="<?= $m['id_merk']; ?>"><?= $m['nama_merk']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama_mobil" id="inputAddress" value="<?= (old('nama_mobil')) ? old('nama_mobil') : $datamobil['nama_mobil']; ?>" placeholder="Nama Mobil">
                        </div>
                        <div class="col-md-6">
                            <label for="warna" class="form-label">Warna Mobil</label>
                            <input type="text" class="form-control" value="<?= (old('warna')) ? old('warna') : $datamobil['warna']; ?>" name="warna" id="inputAddress" placeholder="Warna">
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                            <input type="text" class="form-control" name="jumlah_kursi" value="<?= (old('jumlah_kursi')) ? old('jumlah_kursi') : $datamobil['jumlah_kursi']; ?>" id="inputAddress" placeholder="Jumlah Kursi">
                        </div>
                        <div class="col-md-6">
                            <label for="no_polisi" class="form-label">No Polisi</label>
                            <input type="text" class="form-control" name="no_polisi" value="<?= (old('no_polisi')) ? old('no_polisi') : $datamobil['no_polisi']; ?>" id="inputAddress" placeholder="No Polisi">
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_beli" class="form-label">Tahun Beli</label>
                            <input type="text" class="form-control" name="tahun_beli" value="<?= (old('tahun_beli')) ? old('tahun_beli') : $datamobil['tahun_beli']; ?>" id="inputAddress" placeholder="Tahun Beli">
                        </div>

                        <div class="col-12 mb-3">

                            <label for="formFileSm" class="form-label">Gambar Mobil</label>
                            <input class="form-control form-control-sm" name="gambar" id="formFile" type="file">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/data-mobil" class="btn btn-warning  float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>