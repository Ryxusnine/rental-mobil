<?php
include('../controller/koneksi.php');
?>

<head>
   <title>PELANGGAN</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">

      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="../view/v_pelanggan.php" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Pelanggan</a>
               <a href="../view/v_karyawan.php" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Karyawan</a>
               <h4 class="h4 mt-2 ml-2">PELANGGAN</h4>
            </div>
         </div>
      </div>

      <!-- Modal Untuk menginput Data -->
      <div class="isiform bg-white mt-4 shadow-sm">
      <?php if ($_SESSION['Login']['Posisi']==3) :?>
      <?php elseif ($_SESSION['Login']['Posisi']== 1 OR $_SESSION['Login']['Posisi']==2) :?>
         <button type="button" name="tambahPelanggan" class="btn btn-primary rounded-pill shadow-none" data-toggle="modal" data-target="#ModalTambahData"> <i class="fas fa-fw fa-plus-square"></i><b>Data Pelanggan</b></button>
<?php endif; ?>
         <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-notify modal-primary" role="document">
               <div class="modal-content">
                  <div class="modal-header text-center">
                     <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Data Pelanggan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                     </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                     <form action="../functions/f_pelanggan.php" method="post" role="form" name="forminput" id="forminput" enctype="multipart/form-data">
                        <div class="md-form">
                           <label>NIK</label>
                           <input type="text" name="NIK" class="form-control" autofocus></div>

                        <div class="md-form">
                           <label>Nama</label>
                           <input type="text" name="nama" class="form-control"></div>

                        <div class="md-form">
                           <label>Nama User</label>
                           <input type="text" name="nama_user" class="form-control"></div>

                        <div class="md-form">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control"></div>

                        <div class="form-group">
                           <label>Jenis Kelamin</label>
                           <select class="custom-select browser-default" name="jk">
                              <option selected disabled>Pilih Jenis Kelamin</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                           </select></div>

                        <div class="md-form">
                           <label>Alamat</label>
                           <input type="text" name="alamat" class="form-control"></div>

                        <div class="md-form">
                           <label>Telepon</label>
                           <input type="text" name="telepon" class="form-control"></div>

                        <div class="form-group">
                           <label>Foto Pelanggan</label>
                           <div class="input-group mb-3">
                              <div class="custom-file">
                                 <input type="file" name="FotoPelanggan" class="custom-file-input" id="fm">
                                 <label class="custom-file-label" for="inputFotoPelanggan" aria-describedby="inputFotoPelanggan">Choose file</label>
                              </div>
                           </div>
                        </div>

                        <input type="hidden" name="Posisi" class="form-control" value="3">
                  </div>

                  <div class="modal-footer justify-content-center">
                     <button type="submit" name="AddPelanggan" class="btn btn-outline-primary">Simpan</button>
                  </div>

                  </form>
               </div>
            </div>
         </div><!-- Menutup modal input data     -->

         <div class="panel-body">
            <?php
            include 'alert.php'
            ?>

            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th>No.</th>
                  <th>Id Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Telepon</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  include('../controller/koneksi.php');

                  $query = mysqli_query($konekdb, "SELECT * from users where Posisi = 3 order by id desc");
                  $a = 1;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                     <tr class="text-center">
                        <td><?php echo $a++; ?></td>
                        <td class="align-middle"><?php echo $row['NIK']; ?></td>
                        <td class="align-middle"><?php echo $row['nama']; ?></td>
                        <td class="align-middle"><?php echo $row['telepon']; ?></td>
                        <td>
                        <?php if ($_SESSION['Login']['Posisi']== 1 OR $_SESSION['Login']['Posisi']==2) :?>
                           <a href="#" data-toggle="modal" data-target="#editP<?php echo $a ?>" class="btn btn-primary btn-sm shadow-none"><i class="fas fa-fw fa-edit"></i></a>
                           <a href="../functions/h_pelanggan.php?NIK=<?= $row['NIK'] ?>" class="tombol-hapus btn btn-danger btn-sm shadow-none"><i class="fas fa-fw fa-Trash"></i></a>
                           <a href="#" data-toggle="modal" data-target="#DetailP<?php echo $a ?>" class="btn btn-info btn-sm shadow-none"><i class="fas fa-fw fa-user"></i></a>
                           <?php elseif ($_SESSION['Login']['Posisi']== 3) :?>
                           <a href="#" data-toggle="modal" data-target="#DetailP<?php echo $a ?>" class="btn btn-info btn-sm shadow-none"><i class="fas fa-fw fa-user"></i></a>
                  <?php endif;?>
                        </td>
                     </tr>
                     <!-- Modals Edit -->
                     <?php
                     include '../modals/m_pelanggan.php'
                     ?>
                     <!-- sidebar -->
                     <!-- Full Height Modal right -->
                     <div class="modal fade right" id="DetailP<?= $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                        <div class="modal-dialog modal-full-height modal-right right" role="document">


                           <div class="modal-content">
                              <div class="modal-header purple darken-4 text-white border border-0">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-fw fa-angle-right mt-1 text-white"></i>
                                 </button>
                                 <h4 class="modal-title w-100 h4 ml-3" id="myModalLabel">DETAIL DATA PELANGGAN</h4>
                              </div>
                              <div class="modal-body px-0">
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-4 bg-transparent text-dark text-center">
                                       <img style="width:150px; border: solid 8px #4a148c; border-radius:8px" src="https://localhost/RentalMobil/public/img/fotopelanggan/<?= $row['Foto'] ?>" alt="pelanggan">
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
                                       <i class="fa fa-<?php if ($row['JenisKelamin'] == 'L') {
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