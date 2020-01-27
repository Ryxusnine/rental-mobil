<?php
include('../controller/koneksi.php');
?>

<head>
   <title>sopir</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <button type="button" name="tambahSopir" class="float-right btn btn-custom btn-sm shadow-none rounded mt-1" data-toggle="modal" data-target="#ModalTambahData"> <i class="fas fa-fw fa-plus-square fa-2x"></i> </button>
         <h4 class="h4 mt-2 ml-2">DATA SOPIR</h4>
      </div>

      <!-- modal tambah -->
      <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-notify modal-primary" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <h4 class="modal-title white-text w-100 font-weight-bold">Tambah Data Sopir</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
               </div>

               <!--Body-->
               <div class="modal-body">
                  <form action="../functions/f_sopir.php" method="post" role="form">
                     <div class="md-form">
                        <input type="hidden" name="IdSopir" class="form-control"></div>

                     <div class="md-form">
                        <label>Nama Sopir</label>
                        <input type="text" name="NmSopir" class="form-control"></div>

                     <div class="md-form">
                        <label>Alamat Sopir</label>
                        <input type="text" name="alamat" class="form-control"></div>

                     <div class="md-form">
                        <label for="nts">Telepon</label>
                        <input type="text" name="telepon" id="nts" class="form-control"></div>

                     <div class="md-form">
                        <label for="nsim">No. Sim</label>
                        <input type="text" name="NoSim" id="nsim" class="form-control"></div>

                     <div class="md-form">
                        <label for="th">Tarif/hari</label>
                        <input type="text" name="TarifPerhari" id="th" class="form-control"></div>

                     <div class="modal-footer justify-content-center">
                        <button type="submit" name="AddSpr" class="btn btn-outline-primary">Simpan</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- tutuptambah -->

      <div class="isiform bg-white mt-4 shadow-sm">
         <div class="panel-body">
            <?php
            include 'alert.php'
            ?>
            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th>No.</th>
                  <th>Id Sopir</th>
                  <th>Nama Sopir</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>No. Sim</th>
                  <th>Tarif/hari</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  include('../controller/koneksi.php');

                  $query = mysqli_query($konekdb, "SELECT * from sopir WHERE IdSopir != 8");
                  $a = 1;
                  while ($row = mysqli_fetch_array($query)) {
                     ?>
                     <tr class="text-center">
                        <td><?php echo $a++; ?></td>
                        <td><?php echo $row['IdSopir']; ?></td>
                        <td><?php echo $row['NmSopir']; ?>
                           <div class="badge <?php
                                                if ($row['StatusSopir'] == 'Free')
                                                   echo 'badge-primary';
                                                else if ($row['StatusSopir'] == 'Booked')
                                                   echo 'badge-success';
                                                else if ($row['StatusSopir'] == 'Riding')
                                                   echo 'badge-Danger';
                                                ?> shadow-none"> <?= $row['StatusSopir'] ?></div>
                        </td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['telepon']; ?></td>
                        <td><?php echo $row['NoSim']; ?></td>
                        <td><?php echo 'Rp.' . $row['TarifPerhari']; ?></td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#updtSpr<?php echo $a ?>" class="btn btn-primary btn-sm shadow-none"><i class="fas fa-fw fa-edit"></i></a>
                           <a href="../functions/h_sopir.php?IdSopir=<?= $row['IdSopir'] ?>" class="btn btn-danger btn-sm shadow-none tombol-hapus"><i class="fas fa-fw fa-Trash"></i></a>
                        </td>
                     </tr>
                     <!-- Modals Edit -->
                     <?php
                        include '../modals/m_sopir.php';
                        ?>

                  <?php
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <?php include '../templates/footer.php' ?>
</body>

</html>