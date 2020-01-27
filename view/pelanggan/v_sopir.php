<?php
include('../../controller/koneksi.php');
?>

<head>
   <title>sopir</title>
</head>

<body>
   <?php
   include 'sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <h4 class="h4 mt-2 ml-2">DATA SOPIR</h4>
      </div>

      <div class="isiform bg-white mt-4 shadow-sm">
         <div class="panel-body">
            <table id="dtbl" class="table table-hover mt-2">
               <thead class="text-center">
                  <th>No.</th>
                  <th>Id Sopir</th>
                  <th>Nama Sopir</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>No. Sim</th>
                  <th>Tarif/hari</th>
               </thead>
               <tbody>
                  <?php
                  include('../../controller/koneksi.php');

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
                     </tr>
                  <?php
                  }
                  ?>
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