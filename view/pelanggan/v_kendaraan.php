<?php
include('../../controller/koneksi.php');
?>

<head>
   <title>Kendaraan</title>
</head>

<body class="bg-light">
   <?php
   include 'sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="h4 mt-2 ml-2">KENDARAAN</h4>
            </div>
         </div>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm mb-5">

         <div class="panel-body">
            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th class="align-middle">No.</th>
                  <th>No Polisi</th>
                  <th>Kode Merk</th>
                  <th>Id Type</th>
                  <th>Status Rental</th>
                  <th>Harga Sewa</th>
                  <th>Foto Mobil</th>
               </thead>
               <tbody>
                  <?php
                  include('../../controller/koneksi.php');

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
                     </tr>
                     <!-- Modals Edit -->
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