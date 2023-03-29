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
                    <form class="row g-3" action="/data-akun/update/<?= $dataakun['id_akun']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_akun" value="<?= (old('id_akun')) ? old('id_akun') : $dataakun['id_akun']; ?>">
                        <input type="hidden" name="passwordLama" value="<?= (old('password')) ? old('password') : $dataakun['password']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= (old('foto')) ? old('foto') : $dataakun['foto']; ?>">
                        <div class="col-12">
                            <label for="merk" class="form-label">Nama</label>
                            <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $dataakun['nama']; ?>" class="form-control" id="inputAddress" placeholder="Nama">
                        </div>
                        <div class="col-12">
                            <label for="merk" class="form-label">Username</label>
                            <input type="text" name="username" value="<?= (old('username')) ? old('username') : $dataakun['username']; ?>" class="form-control" id="inputAddress" placeholder="Username">
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
                            <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                            <span>*ukuran foto 200px x 200px</span>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/data-akun" class="btn btn-warning float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>