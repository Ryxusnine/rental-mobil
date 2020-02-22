<?php include '../templates/sidenavbar.php' ?>

<div class="container">
    <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="h4 mt-2 ml-2">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php
                        include '../controller/koneksi.php';
                        $perintah = mysqli_query($konekdb, "SELECT * FROM kendaraan");
                        ?>
                        <b>Data Kendaraan <i class="float-right fas fa-fw fa-car text-secondary"></i></b>
                    </h4>
                    <hr>
                    <p class="card-text">Data Kendaraan sebanyak <span class="badge badge-secondary p-2 shadow-none"><?= mysqli_num_rows($perintah); ?></span> , jika ingin melihat data mobil lebih detail, klik selengkapnya.</p>
                </div>
                <div class="rounded-bottom bg-primary text-center p-2">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item float-right pr-3 white-text"><a href="v_kendaraan" class="text-white ml-auto">Selengkapnya <i class="fas fa-fw fa-chevron-right pl-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php
                        include '../controller/koneksi.php';
                        $perintah = mysqli_query($konekdb, "SELECT * FROM sopir where IdSopir != 8");
                        ?>
                        <b>Data Sopir <i class="float-right fas fa-fw fa-user-tie text-success"></i></b>
                    </h4>
                    <hr>
                    <p class="card-text">Data Sopir sebanyak <span class="badge badge-success p-2 shadow-none"><?= mysqli_num_rows($perintah); ?></span> , jika ingin melihat data sopir lebih detail, klik selengkapnya.</p>
                </div>
                <div class="rounded-bottom bg-primary text-center p-2">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item float-right pr-3 white-text"><a href="v_sopir" class="text-white ml-auto">Selengkapnya <i class="fas fa-fw fa-chevron-right pl-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php
                        include '../controller/koneksi.php';
                        $perintah = mysqli_query($konekdb, "SELECT * FROM users where Posisi=2");
                        ?>
                        <b>Data Karyawan <i class="float-right fas fa-fw fa-user text-warning"></i></b>
                    </h4>
                    <hr>
                    <p class="card-text">Data Karyawan sebanyak <span class="badge badge-warning p-2 shadow-none"><?= mysqli_num_rows($perintah); ?></span> , jika ingin melihat data karyawan lebih detail, klik selengkapnya.</p>
                </div>
                <div class="rounded-bottom bg-primary text-center p-2">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item float-right pr-3 white-text"><a href="v_karyawan" class="text-white ml-auto">Selengkapnya <i class="fas fa-fw fa-chevron-right pl-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php
                        include '../controller/koneksi.php';
                        $perintah = mysqli_query($konekdb, "SELECT * FROM users where Posisi = 3");
                        ?>
                        <b>Data Pelanggan <i class="float-right fas fa-fw fa-users text-danger"></i></b>
                    </h4>
                    <hr>
                    <p class="card-text">Data Pelanggan sebanyak <span class="badge badge-danger p-2 shadow-none"><?= mysqli_num_rows($perintah); ?></span> , jika ingin melihat data pelanggan lebih detail, klik selengkapnya.</p>
                </div>
                <div class="rounded-bottom bg-primary text-center p-2">
                    <ul class="list-unstyled list-inline font-small">
                        <li class="list-inline-item float-right pr-3 white-text"><a href="v_pelanggan" class="text-white ml-auto">Selengkapnya <i class="fas fa-fw fa-chevron-right pl-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>