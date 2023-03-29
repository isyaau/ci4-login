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
                    <form class="row g-3" action="/data-pemesan/update/<?= $datapemesan['id_pemesan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pemesan" value="<?= (old('id_pemesan')) ? old('id_pemesan') : $datapemesan['id_pemesan']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= (old('foto')) ? old('foto') : $datapemesan['foto']; ?>">
                        <div class="col-12">
                            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                            <input type="text" value="<?= (old('nama_pemesan')) ? old('nama_pemesan') : $datapemesan['nama_pemesan']; ?>" name="nama_pemesan" class="form-control" id="inputAddress" placeholder="Nama Pemesan">
                        </div>
                        <div class="col-12">
                            <label for="inputState" class="form-label">Jenis Kelamin</label>
                            <select id="inputState" name="jenis_kelamin" class="form-select">
                                <option value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : $datapemesan['jenis_kelamin']; ?>" selected><?= $datapemesan['jenis_kelamin'] == "laki-laki" ? "Laki-Laki" : "Perempuan" ?></option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat Pemesan</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= (old('alamat')) ? old('alamat') : $datapemesan['alamat']; ?></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="formFileSm" class="form-label">Foto Pemesan</label>
                            <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/data-pemesan" class="btn btn-warning  float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>