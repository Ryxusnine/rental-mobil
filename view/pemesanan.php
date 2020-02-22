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
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2 p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <?php if ($_SESSION['Login']['Posisi'] == 3) : ?>
                  <a href="../view/arsip" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Dibatalakan</a>
                  <a href="../view/transaksi" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Selesai</a>
               <?php elseif ($_SESSION['Login']['Posisi'] == 1 or $_SESSION['Login']['Posisi'] == 2) : ?>
                  <a href="../view/arsip" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Dibatalakan</a>
                  <a href="../view/transaksi" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Transaksi Selesai</a>
                  <a href="../view/pemesanan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Pemesanan</a>
               <?php endif; ?>
               <h4 class="h4 mt-2 ml-2">DATA PEMESANAN</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm mb-5">
         <!-- Modal Untuk menginput Data -->
         <button type="button" name="tambahPemesanan" class="Shadow-none btn btn-primary rounded-pill" data-toggle="modal" data-target="#ModalTambahData"><i class="fas fa-fw fa-plus-square"></i> <b>Pemesanan</b></button>

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
         <!-- Menutup modal input data -->

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
                  if ($_SESSION['Login']['Posisi'] == 3) :
                     $NIK = $_SESSION['Login']['NIK'];
                     $query = mysqli_query($konekdb, "SELECT * from view_transaksi WHERE StatusTransaksi != 'Batal' AND StatusTransaksi != 'Selesai' AND NIK ='$NIK'");
                  elseif ($_SESSION['Login']['Posisi'] == 1 or $_SESSION['Login']['Posisi'] == 2) :
                     $query = mysqli_query($konekdb, "SELECT * from view_transaksi WHERE StatusTransaksi != 'Batal' AND StatusTransaksi != 'Selesai'");
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
                           <?php if ($row['StatusTransaksi'] == 'Proses') : ?>
                              <a href="#" data-toggle="modal" data-target="#DetailPemesanan<?php echo $a ?>" class="btn btn-primary shadow-none"> <i class="fas fa-fw fa-bars"></i></a>
                           <?php elseif ($row['StatusTransaksi'] == 'Mulai') : ?>
                              <button data-toggle="modal" data-target="#RentalSelesai<?php echo $a ?>" class="btn btn-success shadow-none tombol_selesai"><i class="fas fa-check"></i></button>
                              <a href="cetak.php?NTR=<?= $row['NoTransaksi'] ?>" name="Cetak" class="btn btn-dark shadow-none"><i class="fas fa-print"></i> </a>
                           <?php endif; ?>
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
                                 <form action="../functions/batal_pemesanan.php" method="post" role="form" name="forminput" id="forminput">
                                    <ul class="list-group list-group-flush">
                                       <li class="list-group-item py-4 bg-transparent text-dark border-0">
                                          <i class="fas fa-money-check-alt"></i> &nbsp;
                                          <input type="hidden" name="NoTransaksi" value="<?= $row['NoTransaksi'] ?>">
                                          <?= $row['NoTransaksi'] ?>
                                       </li>

                                       <li class="list-group-item py-4 bg-transparent text-dark">
                                          <i class="fa fa-user fa-fw"></i>&nbsp;
                                          <span class="badge badge-info p-2 shadow-none"> <?= $row['NIK'] ?> </span> <?= $row['nama'] ?> - <?= $row['nama_user'] ?>
                                       </li>

                                       <li class="list-group-item py-4 bg-transparent text-dark">
                                          <i class="fas fa-car"></i>&nbsp;
                                          <span class="badge badge-info p-2 shadow-none"> <?php echo $row['NoPlat']; ?> </span>
                                          <input type="hidden" name="kendaraan" value="<?= $row['NoPlat'] ?>">
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
                                          <input type="hidden" name="Sopir" value="<?= $row['Id_Sopir'] ?>">
                                       </li>

                                       <li class="list-group-item bg-transparent py-4 text-dark">
                                          <i class="fas fa-info"></i>&nbsp;
                                          <?= $row['StatusTransaksi'] ?>
                                       </li>

                                    </ul>
                              </div>
                              <div class="row no-gutters">
                                 <div class="col-md-4">
                                    <button type="submit" name="BatalPemesanan" class="btn btn-danger shadow-none"><i class="fas fa-times"></i>&nbsp; Batal</button>
                                 </div>
                                 <div class="col-md-4">
                                    <button type="submit" name="ambilKendaraan" class="btn btn-primary shadow-none"><i class="fas fa-car"></i>&nbsp; Ambil</button>
                                 </div>
                                 <div class="col-md-4">
                                    <a href="cetak.php?NTR=<?= $row['NoTransaksi'] ?>" name="Cetak" class="btn btn-dark shadow-none"><i class="fas fa-print"></i>&nbsp; Cetak</a>
                                 </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="modal fade selesai" id="RentalSelesai<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-notify modal-success" role="document">
                           <div class="modal-content">
                              <div class="modal-header text-center">
                                 <h4 class="modal-title white-text w-100 font-weight-bold">Rental Selesai ?</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                 </button>
                              </div>

                              <!--Body-->
                              <div class="modal-body">
                                 <form action="../functions/f_rentalselesai.php" method="post" role="form">
                                    <div class="form-group">
                                       <label>No Transaksi</label>
                                       <input class="form-control" type="text" name="NoTransaksi" value="<?php echo $row['NoTransaksi']; ?>" disabled></div>

                                    <div class="form-group">
                                       <label>Nama Pelanggan</label>
                                       <input class="form-control" type="text" value="<?php echo $row['nama']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                       <label>Kendaraan</label>
                                       <input class="form-control" type="text" value="( <?php echo $row['NoPlat']; ?> )  <?php echo $row['NmMerk']; ?>  <?php echo $row['NmType']; ?>" disabled>
                                       <input type="hidden" name="kendaraan" value="<?= $row['NoPlat'] ?>">
                                    </div>

                                    <div class="form-group">
                                       <label>Sopir</label>
                                       <input class="form-control" type="text" value="<?php echo $row['NmSopir']; ?>" disabled>
                                       <input type="hidden" name="Sopir" value="<?= $row['Id_Sopir'] ?>">
                                    </div>

                                    <div class="form-group">
                                       <label>Tanggal Pesan</label>
                                       <input class="form-control datepicker" type="text" data-value="<?php echo $row['Tanggal_Pesan']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                       <label>Tanggal Mulai Rental</label>
                                       <input class="form-control datepicker" type="text" data-value="<?php echo $row['Tanggal_Pinjam']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                       <label>Tanggal Selesai Rental</label>
                                       <input class="form-control datepicker" type="text" name="Tanggal_Kembali_selesai" data-value="<?php echo $row['Tanggal_Kembali_Rencana']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                       <label>Lama Rental</label>
                                       <div class="input-group" style="width:100px;">
                                          <input class="form-control" type="text" value="<?php echo $row['LamaRental']; ?>" disabled>
                                          <div class="input-group-prepend">
                                             <span class="input-group-text rounded" style="margin-left:-5px;">Hari</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label>Tanggal Dikembalikan</label>
                                       <input type="text" class="form-control datepicker" name="Tanggal_Sebenarnya" data-value="<?= date('Y-m-d') ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                       <label>Jatuh Tempo</label>
                                       <div class="input-group" style="width:100px;">
                                          <input class="form-control" type="text" name="JatuhTempo" id="JatuhTempo" readonly>
                                          <div class="input-group-prepend">
                                             <span class="input-group-text rounded" style="margin-left:-5px;">Hari</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label>Deskripsi Kerusakan</label>
                                       <textarea class="form-control" rows="3" name="deskripsiKerusakan"></textarea>
                                    </div>

                                    <div class="form-group w-100">
                                       <label for="trf">Biaya BBM</label>
                                       <div class="input-group ">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" name="BiayaBBM" id="BiayaBBM" class="form-control">
                                       </div>
                                    </div>

                                    <div class="form-group w-100">
                                       <label for="trf">Biaya Kerusakan</label>
                                       <div class="input-group ">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" name="BiayaKerusakan" id="BiayaKerusakan" class="form-control">
                                       </div>
                                    </div>

                                    <div class="form-group w-100">
                                       <label for="trf">Denda</label>
                                       <div class="input-group ">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" name="Denda" id="Denda" class="form-control" readonly>
                                       </div>
                                    </div>

                                    <div class="form-group w-100">
                                       <label for="trf">Harga Sewa / Hari</label>
                                       <div class="input-group ">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" name="hargaSewaPerhari" class="form-control" value="<?= $row['HargaSewa'] ?>" disabled>
                                       </div>
                                    </div>

                                    <div class="form-group w-100">
                                       <label for="trf">Tarif Sopir / Hari</label>
                                       <div class="input-group ">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" name="hargaSewaPerhari" class="form-control" value="<?= $row['TarifPerhari'] ?>" disabled>
                                       </div>
                                    </div>

                                    <div class="isiform bg-success text-white">
                                       <div class="form-group w-100">
                                          <label>Total Bayar</label>
                                          <div class="input-group ">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                             </div>
                                             <input type="text" class="form-control" name="TotalBayar" id="TotalBayar_Selesai" value="<?= $row['Total_Bayar'] ?>" disabled>
                                          </div>
                                       </div>

                                       <div class="form-group w-100">
                                          <label>Jumlah Bayar</label>
                                          <div class="input-group ">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                             </div>
                                             <input type="text" class="form-control" name="jumlahBayar" id="JumlahBayar" class="form-group w-100">
                                          </div>
                                       </div>

                                       <div class="form-group w-100">
                                          <label>Kembalian</label>
                                          <div class="input-group ">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                             </div>
                                             <input type="text" class="form-control" name="Kembalian" id="Kembalian" readonly>
                                          </div>
                                       </div>

                                       <input type="hidden" class="form-control" name="StatusTransaksi" value="<?= $row['NoTransaksi'] ?>">

                                    </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" name="RentalSelesai" class="btn btn-outline-success btn-block">Selesai</button>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
         </div>

      <?php } ?>
      </tbody>
      </table>
      </div>
   </div>

   <?php include '../templates/footer.php' ?>
</body>
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

</html>