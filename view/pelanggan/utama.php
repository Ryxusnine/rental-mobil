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
      <div class="row mt-3">
         <?php
         include('../../controller/koneksi.php');

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
                     <a href="pemesanan" class="card-link btn btn-primary shadow-none btn-block">Pesan Mobil</a>
                  </div>
               </div>
            </div>
         <?php } ?>
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