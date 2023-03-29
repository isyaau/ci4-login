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
                    <form class="row g-3" action="/data-mobil/save" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="inputState" class="form-label">Nama Merk</label>
                            <select class="form-select" id="id_merk" name="id_merk">
                                <option selected>Pilih</option>
                                <?php
                                foreach ($merk as $m) : ?>
                                    <option value="<?= $m['id_merk']; ?>"><?= $m['nama_merk']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" value="<?= old('nama_mobil') ?>" name="nama_mobil" id="inputAddress" placeholder="Nama Mobil">
                        </div>
                        <div class="col-md-6">
                            <label for="warna" class="form-label">Warna Mobil</label>
                            <input type="text" class="form-control" value="<?= old('warna') ?>" name="warna" id="inputAddress" placeholder="Warna">
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                            <input type="text" class="form-control" value="<?= old('jumlah_kursi') ?>" name="jumlah_kursi" id="inputAddress" placeholder="Jumlah Kursi">
                        </div>
                        <div class="col-md-6">
                            <label for="no_polisi" class="form-label">No Polisi</label>
                            <input type="text" class="form-control" value="<?= old('no_polisi') ?>" name="no_polisi" id="inputAddress" placeholder="No Polisi">
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_beli" class="form-label">Tahun Beli</label>
                            <input type="text" class="form-control" name="tahun_beli" id="inputAddress" placeholder="Tahun Beli">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="formFileSm" class="form-label">Gambar Mobil</label>
                            <input class="form-control form-control-sm" value="<?= old('nama_merk') ?>" name="gambar" id="formFileSm" type="file">
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mobil</th>
                                <th>Merk</th>
                                <th>Kursi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($joinmobil->getResult() as $m) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>
                                    <td><?= $m->nama_mobil; ?></td>
                                    <td><?= $m->nama_merk; ?></td>
                                    <td><?= $m->jumlah_kursi; ?></td>

                                    <td>
                                        <a href="/data-mobil/edit/<?= $m->id_mobil; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <a href="/data-mobil/detail/<?= $m->id_mobil; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a>
                                        <form action="/data-mobil/<?= $m->id_mobil; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a> </button>
                                        </form>

                                    </td>

                                </tr>

                            <?php endforeach ?>
                        </tbody>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakaah anda yakin ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="">
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputState" class="form-label">Nama Merk</label>
                                                    <select id="inputState" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Nama Mobil</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Mobil">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="merk" class="form-label">Warna Mobil</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Warna">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="merk" class="form-label">Jumlah Kursi</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Jumlah Kursi">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="merk" class="form-label">No Polisi</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="No Polisi">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="merk" class="form-label">Tahun Beli</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="formFileSm" class="form-label">Gambar Mobil</label>
                                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Mobil</th>
                                <th>Merk</th>
                                <th>Kursi</th>
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