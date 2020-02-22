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
               <h4 class="h4 mt-2 ml-2">KENDARAAN</h4>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <?php
         include('../controller/koneksi.php');

         $query = mysqli_query($konekdb, "SELECT * from view_kendaraan WHERE StatusRental ='Kosong'");
         $a = 1;
         while ($row = mysqli_fetch_array($query)) {
         ?>
            <div class="col-md-3 mb-4">
               <div class="card">
                  <img class="card-img-top" src="https://localhost/RentalMobil/public/img/fotomobil/<?= $row['FotoMobil']; ?>" alt="Card image cap">
                  <h5 class="card-title h5"><?php echo $row['NoPlat']; ?></h5>
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item"><?php echo $row['NmMerk']; ?></li>
                     <li class="list-group-item"><?php echo $row['NmType']; ?></li>
                     <li class="list-group-item"><?php echo 'Rp.' . $row['HargaSewa']; ?></li>
                  </ul>
                  <div class="card-body">
                     <a href="pemesanan" data-toggle="modal" data-target="#ModalTambahData" class="card-link btn btn-primary shadow-none btn-block">Pesan Mobil</a>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
      <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-notify modal-primary" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <h4 class="modal-title white-text w-100 font-weight-bold">Tambah Data Pemesanan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
               </div>

               <!--Body-->
               <div class="modal-body">
                  <form action="../functions/f_pemesanan.php" method="post" role="form" name="forminput" id="forminput">

                     <div class="md-form">
                        <?php
                        include '../functions/auto_number.php';
                        $perintah = mysqli_query($konekdb, "SELECT * From transaksi ORDER BY NoTransaksi DESC LIMIT 1");
                        $akhir = mysqli_fetch_array($perintah);
                        $NoTransaksi = autonumber($akhir['NoTransaksi'], 1, 3);
                        ?>
                        <label>Kode Transaksi</label>
                        <input type="text" name="NoTransaksi" class="form-control" value="<?= $NoTransaksi ?>" readonly>
                     </div>


                     <select class="mdb-select md-form colorful-select dropdown-info" name="NmPelanggan">
                        <option selected disabled>Pilih Pelanggan</option>
                        <?php
                        $p = mysqli_query($konekdb, "SELECT * from users where Posisi = 3 order by id desc");
                        while ($poken = mysqli_fetch_array($p)) {
                           echo '<option value="' . $poken['NIK'] . '">' . $poken['nama'] . '</option>';
                        }
                        ?>
                     </select>


                     <select class="mdb-select md-form colorful-select dropdown-info" name="kendaraan" id="mobil">
                        <option selected disabled>Pilih mobil</option>
                        <?php
                        $p = mysqli_query($konekdb, "SELECT * from view_kendaraan WHERE StatusRental != 'Dipesan' AND StatusRental != 'Jalan'");
                        while ($poken = mysqli_fetch_array($p)) {
                           echo '<option value="' . $poken['NoPlat'] . '">' . '(' . $poken['NoPlat'] . ')' . ' - ' . $poken['NmMerk'] . ' - ' . $poken['NmType'] . '</option>';
                        }
                        ?>
                     </select>


                     <div class="form-group" id="harga">
                        <label for="trf">Harga Sewa / Hari</label>
                        <div class="input-group ">
                           <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                           </div>
                           <input type="text" name="HargaMobil" id="hargaSewa" class="form-control" readonly>
                        </div>
                     </div>

                     <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="text" name="tanggalPesan" id="tanggalPesan" class="form-control datepicker" data-value="<?= date('Y-m-d') ?>" readonly>
                     </div>

                     <div class="md-form">
                        <label>Tanggal Mulai Rental</label>
                        <input type="text" name="tanggalRental" id="tanggalRental" class="form-control datepicker">
                     </div>

                     <div class="md-form">
                        <label>Tanggal Selesai Rental</label>
                        <input type="text" name="tanggalSelesaiRental" id="tanggalSelesaiRental" class="form-control datepicker">
                     </div>

                     <div class="form-group">
                        <label>Lama Rental</label>
                        <div class="input-group" style="width:100px;">
                           <input type="text" name="LamaRental" class="form-control lama" id="LamaRental" readonly>
                           <div class="input-group-prepend">
                              <span class="input-group-text rounded" style="margin-left:-5px;">Hari</span>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="switch">
                           <label>
                              Sopir ?
                              <input type="checkbox" id="sopirCheck">
                              <span class="lever"></span>
                           </label>
                        </div>
                        <div id="showSopir" class="d-none">
                           <div class="form-group">
                              <select class="browser-default custom-select sopir" name="Sopir" id="Sopir">
                                 <option harga="0" value="8" selected>Pilih Sopir</option>
                                 <?php
                                 $p = mysqli_query($konekdb, "SELECT * from sopir WHERE StatusSopir != 'Booked' AND StatusSopir != 'Riding' AND IdSopir != 8");
                                 while ($poken = mysqli_fetch_array($p)) {
                                    echo '<option Sopir="' . $poken['TarifPerhari'] . '"  value="' . $poken['IdSopir'] . '">' . $poken['NmSopir'] . '</option>';
                                 }
                                 ?>
                              </select>
                           </div>

                           <div class="form-group" id="tarifSopir">
                              <label for="TarifSopirPerhari">Tarif Sopir / Hari</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                 </div>
                                 <input type="text" class="form-control" name="TarifSopirPerhari" id="TarifSopirPerhari" value="0" readonly>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>

               <div class="modal-footer" style="flex-direction:column">

                  <div class="form-group w-100">
                     <label for="trf">Total Bayar</label>
                     <div class="input-group ">
                        <div class="input-group-prepend">
                           <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" name="TotalBayar" id="TotalBayar" class="form-control" readonly>
                     </div>
                  </div>

                  <button type="submit" name="AddPemesanan" class="btn btn-outline-primary btn-block">Simpan</button>
               </div>

               </form>
            </div>
         </div>
      </div>
      <?php include '../templates/footer.php' ?>
      <script>
         $(document).ready(function() {
            $("#mobil").change(function() {
               var mobil = $("#mobil").val();
               console.log(mobil);
               $.ajax({
                  url: "../functions/ChainHargaMobil.php",
                  data: "mobil=" + mobil,
                  success: function(data) {
                     $("#harga").html(data);
                  }
               });
            });
         });

         $(document).ready(function() {
            $("#Sopir").change(function() {
               var sopir = $("option:selected", this).attr("Sopir");

               $('#TarifSopirPerhari').val(sopir);
            });
         });
      </script>
</body>

</html>