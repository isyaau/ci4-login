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
                    <h6 class="p-0 font-weight-bold text-primary">Tambah Data</h6>
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
                    <form class="row g-3" action="/data-perjalanan/save" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="asal" class="form-label">Kota Asal</label>
                            <input type="text" value="<?= old('asal') ?>" name="asal" class="form-control" id="inputAddress" placeholder="Kota Asal">
                        </div>
                        <div class="col-12">
                            <label for="tujuan" class="form-label">Kota Tujuan</label>
                            <input type="text" name="tujuan" value="<?= old('tujuan') ?>" class="form-control" id="inputAddress" placeholder="Kota Tujuan">
                        </div>
                        <div class="col-12">
                            <label for="jarak" class="form-label">Jarak ( dalam KM )</label>
                            <input type="text" name="jarak" value="<?= old('jarak') ?>" class="form-control" id="inputAddress" placeholder="Jarak (KM)">
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
                    <h6 class="p-0 font-weight-bold text-primary">Daftar Perjalanan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jarak (KM)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($perjalanan as $p) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['asal']; ?></td>
                                    <td><?= $p['tujuan']; ?></td>
                                    <td><?= $p['jarak']; ?> KM</td>
                                    <td>
                                        <a href="/data-perjalanan/edit/<?= $p['id_perjalanan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <form action="/data-perjalanan/<?= $p['id_perjalanan']; ?>" method="post" class="d-inline">
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
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Jarak (KM)</th>
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