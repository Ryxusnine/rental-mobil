<?php
include('../controller/koneksi.php');
?>

<head>
   <title>transaksi</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>

   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
            <?php if($_SESSION['Login']['Posisi']==3):?>
               <a href="" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Transaksi Dibatalakan</a>
               <a href="../view/transaksi" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Selesai</a>
               <?php elseif($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2):?>
               <a href="" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Transaksi Dibatalakan</a>
               <a href="../view/transaksi" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Selesai</a>
               <a href="../view/pemesanan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Pemesanan</a>
<?php endif;?>
               <h4 class="h4 mt-2 ml-2">ARSIP TRANSAKSI</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm mb-5">
         <div class="panel-body">
            <?php
            include 'alert.php'
            ?>
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
                  include('../controller/koneksi.php');
                  if($_SESSION['Login']['Posisi']==3) :
                     $NIK = $_SESSION['Login']['NIK'];
                     $query = mysqli_query($konekdb, "SELECT * from view_transaksi WHERE StatusTransaksi = 'Batal'AND NIK ='$NIK'");
                     elseif ($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2) :
                        $query = mysqli_query($konekdb, "SELECT * from view_transaksi WHERE StatusTransaksi = 'Batal'");
                     endif;
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

                                    <li class="list-group-item bg-transparent py-3 text-dark">
                                       <i class="fas fa-info"></i>&nbsp;
                                       <?= $row['StatusTransaksi'] ?>
                                    </li>

                                 </ul>
                              </div>
                              <a href="cetak.php?NTR=<?= $row['NoTransaksi'] ?>" name="Cetak" class="btn btn-dark shadow-none"><i class="fas fa-print"></i>&nbsp; Cetak</a>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <?php include '../templates/footer.php' ?>
</body>

</html>