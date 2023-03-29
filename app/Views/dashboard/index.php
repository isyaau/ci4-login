<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Aplikasi Rental Mobil</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Mobil</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2 Mobil</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Pemesan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 Pemesan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pesanan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">4 Pesanan</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Akun</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2 Akun</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-11 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Akun yang sedang login</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 text-center">
                            <img class="px-3 px-sm-4 mt-3 mb-4 img-thumbnail" width="200px" height="200px" src="/img/<?= session()->get('foto'); ?>" alt="...">
                        </div>
                        <div class="col-7">
                            <div class="row my-3">
                                <div class="col-3">Nama</div>

                                <div class="col-8">: <?= $session->get('nama'); ?></div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Username</div>

                                <div class="col-8">: <?= $session->get('username') ?></div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Tanggal Login</div>
                                <?php
                                function tanggal_indo($tanggal, $cetak_hari = false)
                                {
                                    $hari = array(
                                        1 =>    'Senin',
                                        'Selasa',
                                        'Rabu',
                                        'Kamis',
                                        'Jumat',
                                        'Sabtu',
                                        'Minggu'
                                    );

                                    $bulan = array(
                                        1 =>   'Januari',
                                        'Februari',
                                        'Maret',
                                        'April',
                                        'Mei',
                                        'Juni',
                                        'Juli',
                                        'Agustus',
                                        'September',
                                        'Oktober',
                                        'November',
                                        'Desember'
                                    );
                                    $split       = explode('-', $tanggal);

                                    $tgl_indo = $split[0] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[2];

                                    if ($cetak_hari) {
                                        $num = date('N', strtotime($tanggal));
                                        return $hari[$num] . ', ' . $tgl_indo;
                                    }
                                    return $tgl_indo;
                                }
                                ?>

                                <div class="col-8">: <?= tanggal_indo(date('d-m-Y'), true); ?>. Jam <?= session()->get('time'); ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->

    </div>

</div>
<?= $this->endSection(); ?>