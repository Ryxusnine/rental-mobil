<?php
include('../controller/koneksi.php');
?>

<head>
   <title>Kendaraan</title>
</head>

<body class="bg-light">
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="../view/v_type" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Type</a>
               <a href="../view/v_merk" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Merk</a>
               <a href="../view/v_merk" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Kendaraan</a>
               <h4 class="h4 mt-2 ml-2">KENDARAAN</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm mb-5">
         <!-- Modal Untuk menginput Data -->
         <?php if ($_SESSION['Login']['Posisi']==3):?>
         <?php elseif ($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2):?>
         <button type="button" name="tambahKen" class="Shadow-none btn btn-primary rounded-pill" data-toggle="modal" data-target="#ModalTambahData"><i class="fas fa-fw fa-plus-square"></i><b>Kendaraan</b></button>
<?php endif;?>

         <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-notify modal-primary" role="document">
               <div class="modal-content">
                  <div class="modal-header text-center">
                     <h4 class="modal-title white-text w-100 font-weight-bold">Tambah Data Kendaraan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                     </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                     <form action="../functions/f_kendaraan.php" method="post" role="form" name="forminput" id="forminput" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-5">

                              <div class="form-group">
                                 <label for="n">No Polisi</label>
                                 <input type="text" name="nopol" id="n" class="form-control" placeholder="Masukkan Nomor Polisi" autofocus></div>

                              <div class="form-group">
                                 <label>Merk</label>
                                 <select class="custom-select browser-default" id="merek" name="KdMerk">
                                    <option disabled selected>- Pilih Merk -</option>
                                    <?php
                                    $p = mysqli_query($konekdb, "SELECT * from merk");
                                    while ($poken = mysqli_fetch_array($p)) {
                                       ?>
                                       <option value="<?= $poken['KdMerk'] ?>"><?= $poken['NmMerk'] ?></option>
                                    <?php } ?>
                                 </select></div>

                              <div class="form-group" id="type">
                                 <label>Type</label>
                                 <select class="custom-select browser-default" name="IdType">
                                    <option disabled selected>- Pilih Type -</option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-7">
                              <div class="form-group">
                                 <label for="hs">Harga Sewa</label>
                                 <input type="text" name="HargaSewa" id="hs" class="form-control" placeholder="Harga Sewa Kendaraan"></div>

                              <div class="form-group">
                                 <label for="fm">Foto Mobil</label>
                                 <div class="input-group mb-3">
                                    <div class="custom-file">
                                       <input type="file" name="FotoMobil" class="custom-file-input" id="fm">
                                       <label class="custom-file-label" for="inputFotoMobil" aria-describedby="inputFotoMobil">Choose file</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>


                  <div class="modal-footer">
                     <button type="submit" name="AddKendaraan" class="btn btn-outline-primary btn-block">Simpan</button>
                  </div>

                  </form>
               </div>
            </div>
         </div>
         <!-- Menutup modal input data -->

         <div class="panel-body">
            <?php
            include 'alert.php'
            ?>
            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th class="align-middle">No.</th>
                  <th>No Polisi</th>
                  <th>Kode Merk</th>
                  <th>Id Type</th>
                  <th>Status Rental</th>
                  <th>Harga Sewa</th>
                  <th>Foto Mobil</th>
                  <?php if ($_SESSION['Login']['Posisi']==3):?>
                  <?php elseif ($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2):?>
                  <th>Action</th>
                                    <?php endif;?>
               </thead>
               <tbody>
                  <?php
                  include('../controller/koneksi.php');

                  $query = mysqli_query($konekdb, "select * from view_kendaraan");
                  $a = 1;
                  while ($row = mysqli_fetch_array($query)) {
                     ?>
                     <tr class="text-center">
                        <td class="align-middle"><?php echo $a++; ?></td>
                        <td class="align-middle"><?php echo $row['NoPlat']; ?></td>
                        <td class="align-middle"><?php echo $row['NmMerk']; ?></td>
                        <td class="align-middle"><?php echo $row['NmType']; ?></td>
                        <td class="align-middle">
                           <div class="badge <?php
                                                if ($row['StatusRental'] == 'Kosong')
                                                   echo 'badge-primary';
                                                else if ($row['StatusRental'] == 'Dipesan')
                                                   echo 'badge-success';
                                                else if ($row['StatusRental'] == 'Jalan')
                                                   echo 'badge-Danger';
                                                ?> p-2 shadow-none"><?php echo $row['StatusRental']; ?></div>
                        </td>
                        <td class="align-middle"><?php echo 'Rp.' . $row['HargaSewa']; ?></td>
                        <td class="align-middle"><img class="img-thumbnail" width="100" src="https://localhost/RentalMobil/public/img/fotomobil/<?= $row['FotoMobil']; ?>"></td>
                        <td class="align-middle">
                        <?php if ($_SESSION['Login']['Posisi']==3):?>
                        <?php elseif ($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2):?>
                           <a href="#" data-toggle="modal" data-target="#editKen<?php echo $a ?>" class="Shadow-none btn btn-primary "><i class="fas fa-fw fa-edit"></i></a>
                           <a href="..\functions\h_kendaraan.php?IdKendaraan=<?= $row['IdKendaraan']; ?>" class="Shadow-none btn btn-danger tombol-hapus"> <i class="fas fa-fw fa-Trash"></i></a>
                  <?php endif;?>
                        </td>
                     </tr>
                     <!-- Modals Edit -->
                     <?php
                        include '../modals/m_kendaraan.php'
                        ?>


                  <?php
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>

      <?php include '../templates/footer.php' ?>
</body>
<script>
   $(document).ready(function() {
      $("#merek").change(function() {
         var merek = $("#merek").val();
         console.log(merek);
         $.ajax({
            url: "../functions/ChainComboType.php",
            data: "merek=" + merek,
            success: function(data) {
               $("#type").html(data);
            }
         });
      });
   });
</script>


</html>