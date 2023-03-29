<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
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
                    <form class="row g-3" action="/data-akun/save" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="merk" class="form-label">Nama</label>
                            <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control" id="inputAddress" placeholder="Nama">
                        </div>
                        <div class="col-12">
                            <label for="merk" class="form-label">Username</label>
                            <input type="text" name="username" value="<?= old('username') ?>" class="form-control" id="inputAddress" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label for="merk" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputAddress" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <label for="merk" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confpassword" class="form-control" id="inputAddress" placeholder="Konfirmasi Password">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="formFileSm" class="form-label">Foto</label>
                            <input class="form-control form-control-sm" value="<?= old('foto') ?>" name="foto" id="formFileSm" type="file">
                            <span>*ukuran foto 200px x 200px</span>
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($akun as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['username']; ?></td>
                                    <td>
                                        <a href="/data-akun/edit/<?= $a['id_akun']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <a href="/data-akun/detail/<?= $a['id_akun']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a>
                                        <form action="/data-akun/<?= $a['id_akun']; ?>" method="post" class="d-inline">
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
                                <th>Username</th>
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