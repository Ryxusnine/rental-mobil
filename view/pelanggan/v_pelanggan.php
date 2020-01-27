<?php
include('../../controller/koneksi.php');
?>

<head>
   <title>PELANGGAN</title>
</head>

<body>
   <?php
   include 'sidenavbar.php'
   ?>
   <div class="container">

      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="v_pelanggan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Pelanggan</a>
               <a href="v_karyawan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Karyawan</a>
               <h4 class="h4 mt-2 ml-2">PELANGGAN</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm">
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
                  include('../../controller/koneksi.php');

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
                           <a href="#" data-toggle="modal" data-target="#DetailPelanggan<?= $a ?>" class="btn btn-info btn-sm shadow-none"><i class="fas fa-fw fa-user"></i></a>
                        </td>
                     </tr>
                     <!-- sidebar -->
                     <!-- Full Height Modal right -->
                     <div class="modal fade right" id="DetailPelanggan<?= $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

   <script src="..\..\public\vendor\MaterialBootstrap\js\jquery-3.4.1.min.js"></script>
   <script src="..\..\public\vendor\MaterialBootstrap\js\popper.min.js"></script>
   <script src="..\..\public\vendor\MaterialBootstrap\js\bootstrap.min.js"></script>
   <script src="..\..\public\vendor\MaterialBootstrap\js\mdb.min.js"></script>
   <script src="..\..\public\vendor\MaterialBootstrap\js\addons\datatables.js"></script>
   <script src="..\..\public\vendor\MaterialBootstrap\js\jquery.mask.min.js"></script>
   <script src="..\..\public\vendor\SweetAlert2\dist\sweetalert2.all.min.js"></script>
   <script src="..\..\public\js\datepicker_sett.js"></script>
   <script src="..\..\public\js\moment.js"></script>
   <script src="..\..\public\js\transaksi.js"></script>
   <script src="..\..\public\js\script.js"></script>
</body>

</html>