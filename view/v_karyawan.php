<?php
include('../controller/koneksi.php');
?>
<html>

<head>
   <title>Karyawan</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="../view/v_pelanggan.php" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Pelanggan</a>
               <a href="../view/v_karyawan.php" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Karyawan</a>
               <h4 class="h4 mt-2 ml-2">KARYAWAN</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm">
         <!-- Modal Untuk menginput Data -->
         <?php if ($_SESSION['Login']['Posisi'] == 2) : ?>

         <?php elseif ($_SESSION['Login']['Posisi'] == 1) : ?>
            <button type="button" name="tambahPelanggan" class="btn btn-primary shadow-none rounded-pill" data-toggle="modal" data-target="#ModalTambahData"> <i class="fas fa-fw fa-plus-square"></i> <b>Data Karyawan</b></button>
         <?php endif; ?>

         <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-notify modal-primary" role="document">
               <div class="modal-content">
                  <div class="modal-header text-center">
                     <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Data Karyawan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                     </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                     <form action="../functions/f_karyawan.php" method="post" role="form" name="forminput" id="forminput" enctype="multipart/form-data">
                        <div class="md-form">
                           <label for="n">NIK</label>
                           <input type="text" name="NIK" id="n" class="form-control" autofocus></div>

                        <div class="md-form">
                           <label for="n">Nama</label>
                           <input type="text" name="nama" id="n" class="form-control"></div>

                        <div class="md-form">
                           <label for="nu">Nama User</label>
                           <input type="text" name="nama_user" id="nu" class="form-control"></div>

                        <div class="md-form">
                           <label for="p">Password</label>
                           <input type="text" name="password" id="p" class="form-control"></div>

                        <div class="form-group">
                           <label>Jenis Kelamin</label>
                           <select class="custom-select browser-default" name="jenkel">
                              <option selected disabled>Pilih Jenis Kelamin</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                           </select></div>

                        <div class="md-form">
                           <label for="a">Alamat</label>
                           <input type="text" name="alamat" id="a" class="form-control"></div>

                        <div class="md-form">
                           <label for="t">Telepon</label>
                           <input type="text" name="telepon" id="t" class="form-control">
                        </div>

                        <div class="form-group">
                           <label>Foto Karyawan</label>
                           <div class="input-group mb-3">
                              <div class="custom-file">
                                 <input type="file" name="FotoKaryawan" class="custom-file-input" id="fm">
                                 <label class="custom-file-label" for="inputFotoKaryawan" aria-describedby="inputFotoKaryawan">Choose file</label>
                              </div>
                           </div>
                        </div>

                        <input type="hidden" name="Posisi" class="form-control" value="2">
                  </div>

                  <div class="modal-footer justify-content-center">
                     <button type="submit" name="AddKaryawan" class="btn btn-outline-primary">Simpan</button>

                  </div>
                  </form>

               </div>
            </div>
         </div>
         <!-- Menutup modal input data     -->

         <div class="panel-body">
            <?php
            include 'alert.php'
            ?>
            <table id="dtbl" class=" table table-hover mt-2">
               <thead class="text-center">
                  <th class="align-middle">No.</th>
                  <th class="align-middle">NIK</th>
                  <th class="align-middle">Nama</th>
                  <th class="align-middle">Telepon</th>
                  <th class="align-middle">Action</th>
               </thead>
               <tbody>
                  <?php
                  include('../controller/koneksi.php');

                  $query = mysqli_query($konekdb, "SELECT * from users where Posisi = 2 order by id desc");
                  $a = 1;
                  while ($row = mysqli_fetch_array($query)) {
                     ?>
                     <tr class="text-center">
                        <td class="align-middle"><?php echo $a++; ?></td>
                        <td class="align-middle"><?php echo $row['NIK']; ?></td>
                        <td class="align-middle"><?php echo $row['nama']; ?></td>
                        <td class="align-middle"><?php echo $row['telepon']; ?></td>
                        <td class="align-middle">

                           <?php if ($_SESSION['Login']['Posisi'] == 1) : ?>
                              <a href="#" data-toggle="modal" data-target="#editK<?php echo $a ?>" class="btn btn-primary btn-sm shadow-none"><i class="fas fa-fw fa-edit"></i></a>
                              <a href="../functions/h_karyawan.php?NIK=<?= $row['NIK'] ?>" class="tombol-hapus btn btn-danger btn-sm shadow-none"><i class="fas fa-fw fa-Trash"></i></a>
                              <a href="#" data-toggle="modal" data-target="#DetailKaryawan<?php echo $a ?>" class="btn btn-info btn-sm shadow-none"><i class="fas fa-fw fa-user"></i></a>
                           <?php elseif ($_SESSION['Login']['Posisi'] == 2) : ?>
                              <a href="#" data-toggle="modal" data-target="#DetailKaryawan<?php echo $a ?>" class="btn btn-info btn-sm shadow-none"><i class="fas fa-fw fa-user"></i></a>
                           <?php endif; ?>
                        </td>
                     </tr>
                     <!-- Modals Edit -->
                     <?php
                        include '../modals/m_karyawan.php'
                        ?>
                     <!-- sidebar -->
                     <!-- Full Height Modal right -->
                     <div class="modal fade right" id="DetailKaryawan<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                        <div class="modal-dialog modal-full-height modal-right right" role="document">


                           <div class="modal-content">
                              <div class="modal-header purple darken-4 text-white border border-0">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-fw fa-angle-right mt-1 text-white"></i>
                                 </button>
                                 <h4 class="modal-title w-100 h4 ml-3" id="myModalLabel">DETAIL DATA KARYAWAN</h4>
                              </div>
                              <div class="modal-body px-0">
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-4 bg-transparent text-dark text-center">
                                       <img style="width:150px; border: solid 8px #4a148c; border-radius:8px" src="https://localhost/RentalMobil/public/img/fotokaryawan/<?= $row['Foto'] ?>" alt="karyawan">
                                    </li>
                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fa fa-user fa-fw"></i>
                                       <?= $row['nama'] ?> -
                                       <?= $row['nama_user'] ?>
                                    </li>

                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fa fa-address-card fa-fw"></i>
                                       <?= $row['NIK'] ?>
                                    </li>
                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fas fa-location-arrow fa-fw"></i>
                                       <?= $row['Alamat'] ?>
                                    </li>
                                    <li class="list-group-item bg-transparent py-4 text-dark">
                                       <i class="fas fa-phone fa-fw"></i>
                                       <?= $row['telepon'] ?>
                                    </li>
                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fa fa-
                                       <?php if ($row['JenisKelamin'] == 'L') {
                                             echo 'male';
                                          } else {
                                             echo 'female';
                                          } ?> fa-fw">
                                       </i>
                                       <?php if ($row['JenisKelamin'] == 'L') {
                                             echo 'Laki-laki';
                                          } else {
                                             echo 'Perempuan';
                                          } ?>
                                    </li>
                                 </ul>
                              </div>

                           </div>
                        </div>
                     </div>
         </div>
         <!-- Full Height Modal right -->

      <?php
      }
      ?>
      </tbody>
      </table>
      </div>
   </div>

   <?php include '../templates/footer.php' ?>
</body>


</html>