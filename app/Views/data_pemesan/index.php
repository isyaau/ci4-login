<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pemesan</h1>
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
                    <form class="row g-3" action="/data-pemesan/save" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="nama" class="form-label">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" value="<?= old('nama_pemesan') ?>" class="form-control" id="inputAddress" placeholder="Nama Pemesan">
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Jenis Kelamin</label>
                            <select id="inputState" name="jenis_kelamin" class="form-select">
                                <option selected value="<?= old('jenis_kelamin') ?>">Pilih...</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat Pemesan</label>
                            <textarea class="form-control" value="<?= old('alamat') ?>" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="formFileSm" class="form-label">Foto Pemesan</label>
                            <input class="form-control form-control-sm" value="<?= old('foto') ?>" name="foto" id="formFileSm" type="file">
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pemesan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pemesan as $p) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['nama_pemesan']; ?></td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td>
                                        <a href="/data-pemesan/edit/<?= $p['id_pemesan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <a href="/data-pemesan/detail/<?= $p['id_pemesan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a>
                                        <form action="/data-pemesan/<?= $p['id_pemesan']; ?>" method="post" class="d-inline">
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
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
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