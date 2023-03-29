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
        <div class="col-xl3 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-3">Nama</div>
                        <div class="col">: <?= $dataakun['nama'];  ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-3">Username</div>
                        <div class="col">: <?= $dataakun['username'];  ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-3">Foto</div>
                        <div class="col"><img class="px-3 px-sm-4 mt-3 mb-4 img-thumbnail" src="/img/<?= $dataakun['foto'];  ?>" width="200px" height="200px" alt="<?= $dataakun['foto'];  ?>">
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <a href="/data-akun" class="btn btn-warning  float-right">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>