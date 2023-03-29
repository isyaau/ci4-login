<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
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
                    <form class="row g-3" action="/data-pesanan/update/<?= $datapesanan['id_pesanan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pesanan" value="<?= (old('id_pesanan')) ? old('id_pesanan') : $datapesanan['id_pesanan']; ?>">
                        <div class="col-12">
                            <label for="inputState" class="form-label">Nama Pemesan</label>
                            <select name="id_pemesan" id="inputState" class="form-select">
                                <option selected value="<?= (old('id_pemesan')) ? old('id_pemesan') : $joinpesanan->getRow('id_pemesan'); ?>"><?= (old('nama_pemesan')) ? old('nama_pemesan') : $joinpesanan->getRow('nama_pemesan'); ?></option>
                                <?php
                                foreach ($pemesan as $p) : ?>
                                    <option value="<?= $p['id_pemesan']; ?>"><?= $p['nama_pemesan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Mobil</label>
                            <select name="id_mobil" id="inputState" class="form-select">
                                <option selected value="<?= (old('id_mobil')) ? old('id_mobil') : $joinpesanan->getRow('id_mobil'); ?>"><?= (old('nama_mobil')) ? old('nama_mobil') : $joinpesanan->getRow('nama_mobil'); ?></option>
                                <?php
                                foreach ($mobil as $m) : ?>
                                    <option value="<?= $m['id_mobil']; ?>"><?= $m['nama_mobil']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Perjalanan</label>
                            <select name="id_perjalanan" id="inputState" class="form-select">
                                <option selected value="<?= (old('id_perjalanan')) ? old('id_perjalanan') : $joinpesanan->getRow('id_perjalanan'); ?>">
                                    <?= (old('asal')) ? old('asal') : $joinpesanan->getRow('asal'); ?> -
                                    <?= (old('tujuan')) ? old('tujuan') : $joinpesanan->getRow('tujuan'); ?>
                                    (<?= (old('jarak')) ? old('jarak') : $joinpesanan->getRow('jarak'); ?> KM)
                                </option>
                                <?php
                                foreach ($perjalanan as $p) : ?>
                                    <option value="<?= $p['id_perjalanan']; ?>"><?= $p['asal']; ?> - <?= $p['tujuan']; ?> (<?= $p['jarak']; ?> KM)</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Jenis Bayar</label>
                            <select name="id_jenisbayar" id="inputState" class="form-select">
                                <option selected value="<?= (old('id_jenisbayar')) ? old('id_jenisbayar') : $joinpesanan->getRow('id_jenisbayar'); ?>"><?= (old('jenis_bayar')) ? old('jenis_bayar') : $joinpesanan->getRow('jenis_bayar'); ?></option>
                                <?php
                                foreach ($bayar as $b) : ?>
                                    <option value="<?= $b['id_jenisbayar']; ?>"><?= $b['jenis_bayar']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Harga</label>
                            <input name="harga" value="<?= (old('harga')) ? old('harga') : $joinpesanan->getRow('harga'); ?>" type="text" class="form-control" id="inputAddress" placeholder="Harga">
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Tanggal Pinjam</label>
                            <input name="tgl_pinjam" value="<?= (old('tgl_pinjam')) ? old('tgl_pinjam') : $joinpesanan->getRow('tgl_pinjam'); ?>" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Tanggal Kembali</label>
                            <input name="tgl_kembali" value="<?= (old('tgl_kembali')) ? old('tgl_kembali') : $joinpesanan->getRow('tgl_kembali'); ?>" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/data-pesanan" class="btn btn-warning  float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>