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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
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
                    <form class="row g-3" action="/data-pesanan/save" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="inputState" class="form-label">Nama Pemesan</label>
                            <select name="id_pemesan" id="inputState" class="form-select">
                                <option selected>Pilih...</option>
                                <?php
                                foreach ($pemesan as $p) : ?>
                                    <option value="<?= $p['id_pemesan']; ?>"><?= $p['nama_pemesan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Mobil</label>
                            <select name="id_mobil" id="inputState" class="form-select">
                                <option selected>Pilih...</option>
                                <?php
                                foreach ($mobil as $m) : ?>
                                    <option value="<?= $m['id_mobil']; ?>"><?= $m['nama_mobil']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Perjalanan</label>
                            <select name="id_perjalanan" id="inputState" class="form-select">
                                <option selected>Pilih...</option>
                                <?php
                                foreach ($perjalanan as $p) : ?>
                                    <option value="<?= $p['id_perjalanan']; ?>"><?= $p['asal']; ?> - <?= $p['tujuan']; ?> (<?= $p['jarak']; ?> KM)</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Jenis Bayar</label>
                            <select name="id_jenisbayar" id="inputState" class="form-select">
                                <option selected>Pilih...</option>
                                <?php
                                foreach ($bayar as $b) : ?>
                                    <option value="<?= $b['id_jenisbayar']; ?>"><?= $b['jenis_bayar']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Harga</label>
                            <input name="harga" type="text" class="form-control" id="inputAddress" placeholder="Harga">
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Tanggal Pinjam</label>
                            <input name="tgl_pinjam" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                        </div>
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Tanggal Kembali</label>
                            <input name="tgl_kembali" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
                            <input class="btn btn-danger" type="reset" value="X Batal">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Area Data -->
        <div class="col-xl-8 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Mobil</th>
                                <th>Jenis Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($joinpesanan->getResult() as $p) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nama_pemesan; ?></td>
                                    <td><?= $p->nama_mobil; ?></td>
                                    <td><?= $p->jenis_bayar; ?></td>

                                    <td>
                                        <a href="/data-pesanan/edit/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <a href="/data-pesanan/detail/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a>
                                        <form action="/data-pesanan/<?= $p->id_pesanan; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a> </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Mobil</th>
                                <th>Jenis Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>