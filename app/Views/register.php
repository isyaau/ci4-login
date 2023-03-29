<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E-ARSIP</h1>
                                    </div>
                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                    <?php endif; ?>
                                    <form class="user" action="/register/save" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama" class="form-control form-control-user" id="floatingInput" value="<?= set_value('nama') ?>" placeholder="Nama">
                                            <label for="floatingInput">Nama</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="no_induk" class="form-control form-control-user" id="floatingInput" value="<?= set_value('no_induk') ?>" placeholder="No Induk">
                                                    <label for="floatingInput">No Induk</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="kelas" class="form-control form-control-user" id="floatingInput" value="<?= set_value('kelas') ?>" placeholder="Kelas">
                                                    <label for="floatingInput">Kelas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="alamat" class="form-control form-control-user" id="floatingInput" value="<?= set_value('alamat') ?>" placeholder="Alamat">
                                            <label for="floatingInput">Alamat</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="no_hp" class="form-control form-control-user" id="floatingInput" value="<?= set_value('no_hp') ?>" placeholder="No HP">
                                                    <label for="floatingInput">No HP</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="email" class="form-control form-control-user" id="floatingInput" value="<?= set_value('email') ?>" placeholder="Email">
                                                    <label for="floatingInput">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select px-3" style="border-radius: 10rem;  font-size: 0.8rem;" id="floatingSelect" aria-label="Floating label select example" name="role">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Kepala Sekolah</option>
                                                <option value="3">Siswa</option>
                                            </select>
                                            <label for="floatingSelect">Role</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="username" class="form-control form-control-user" id="floatingInput" value="<?= set_value('username') ?>" placeholder="Username">
                                            <label for="floatingInput">Username</label>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="password" name="password" class="form-control form-control-user" id="floatingInput" placeholder="Password">
                                                    <label for="floatingInput">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="password" name="confpassword" class="form-control form-control-user" id="floatingInput" placeholder="Confirm Password">
                                                    <label for="floatingInput">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                    <!-- <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>