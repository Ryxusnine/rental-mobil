<?php
include('../../controller/koneksi.php');
?>

<head>
   <title>pemesanan</title>
</head>

<body>
   <?php
   include 'sidenavbar.php'
   ?>

   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="h4 mt-2 ml-2">DATA TRANSAKSI SELESAI</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm mb-5">
         <div class="panel-body">
            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th>No.</th>
                  <th>No. Transaksi</th>
                  <th>Identitas Penyewa</th>
                  <th>Mobil</th>
                  <th>Tanggal Mulai</th>
                  <th>Lama Rental</th>
                  <th>Total</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  include('../../controller/koneksi.php');
                  $NIK = $_SESSION['Login']['NIK'];
                  $query = mysqli_query($konekdb, "SELECT * from view_transaksi WHERE StatusTransaksi = 'Selesai' AND NIK ='$NIK'");
                  $a = 1;
                  while ($row = mysqli_fetch_array($query)) {
                     ?>
                     <tr class="text-center">
                        <td class="align-middle"><?php echo $a++; ?></td>
                        <td class="align-middle"><?php echo $row['NoTransaksi']; ?>
                           <div class="badge <?php
                                                if ($row['StatusTransaksi'] == 'Proses')
                                                   echo 'badge-primary';
                                                else if ($row['StatusTransaksi'] == 'Batal')
                                                   echo 'badge-danger';
                                                else if ($row['StatusTransaksi'] == 'Mulai')
                                                   echo 'badge-warning';
                                                else if ($row['StatusTransaksi'] == 'Selesai')
                                                   echo 'badge-success';
                                                ?> shadow-none"> <?= $row['StatusTransaksi'] ?></div>
                        </td>
                        <td class="align-middle"><?php echo $row['nama']; ?></td>
                        <td class="align-middle"><span class="badge badge-info p-2 shadow-none">[ <?php echo $row['NoPlat']; ?> ] </span>
                           <?php echo $row['NmMerk']; ?>
                           <?php echo $row['NmType']; ?></td>
                        <td class="align-middle"><?php echo $row['Tanggal_Pinjam'] ?></td>
                        <td class="align-middle"><?php echo $row['LamaRental'] ?></td>
                        <td class="align-middle">Rp. <?php echo $row['Total_Bayar'] ?></td>
                        <td class="align-middle">
                           <a href="#" data-toggle="modal" data-target="#DetailPemesanan<?php echo $a ?>" class="btn btn-primary shadow-none"> <i class="fas fa-fw fa-users"></i></a>
                        </td>
                     </tr>
                     <!-- Full Height Modal right -->
                     <div class="modal fade right" id="DetailPemesanan<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                        <div class="modal-dialog modal-full-height modal-right right" role="document">


                           <div class="modal-content">
                              <div class="modal-header purple darken-4 text-white border border-0">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-fw fa-angle-right mt-1 text-white"></i>
                                 </button>
                                 <h4 class="modal-title w-100 h4 ml-3" id="myModalLabel">DETAIL DATA PEMESANAN</h4>
                              </div>
                              <div class="modal-body">
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-4 bg-transparent text-dark border-0">
                                       <i class="fas fa-money-check-alt"></i> &nbsp;
                                       <?= $row['NoTransaksi'] ?>
                                    </li>

                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fa fa-user fa-fw"></i>&nbsp;
                                       <span class="badge badge-info p-2 shadow-none"> <?= $row['NIK'] ?> </span> <?= $row['nama'] ?> - <?= $row['nama_user'] ?>
                                    </li>

                                    <li class="list-group-item py-4 bg-transparent text-dark">
                                       <i class="fas fa-car"></i>&nbsp;
                                       <span class="badge badge-info p-2 shadow-none"> <?php echo $row['NoPlat']; ?> </span>
                                       <?php echo $row['NmMerk']; ?>
                                       <?php echo $row['NmType']; ?>
                                    </li>

                                    <li class="list-group-item bg-transparent py-4 text-dark">
                                       <i class="fas fa-phone fa-fw"></i>&nbsp;
                                       <?= $row['telepon'] ?>
                                    </li>

                                    <li class="list-group-item bg-transparent py-4 text-dark">
                                       <i class="fas fa-calendar-alt"></i>&nbsp;
                                       <?= $row['Tanggal_Pinjam'] ?> <span class="badge badge-info p-2 shadow-none">S/d</span> <?= $row['Tanggal_Kembali_Rencana'] ?> <span class="badge badge-info p-2 shadow-none"><?= $row['LamaRental'] ?></span>
                                    </li>

                                    <li class="list-group-item bg-transparent py-4 text-dark">
                                       <i class="fas fa-user-tie"></i>&nbsp;
                                       <?= $row['NmSopir'] ?>
                                    </li>

                                    <li class="list-group-item bg-transparent py-4 text-dark">
                                       <i class="fas fa-info"></i>&nbsp;
                                       <?= $row['StatusTransaksi'] ?>
                                    </li>

                                 </ul>
                              </div>

                           </div>
                        </div>
                     </div>
                  <?php } ?>
               </tbody>
            </table>
         </div>
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