<?php
include '../templates/sidenavbar.php'
?>

<div class="container">
   <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="h4 mt-2 ml-2">Dashboard</h4>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-3">
         <div class="card mt-4">
            <div class="card-body">
               <h4 class="card-title">
                  <?php
                  include('..\controller\koneksi.php');

                  $perintah = mysqli_query($konekdb, "select * from kendaraan");
                  ?>
                  <b>
                     Data Mobil<i class="float-right fas fa-car"></i>
                  </b>
               </h4>
               <hr>
               <p class="card-text">Data mobil sebanyak <span class="badge badge-secondary p-2 shadow-none"><?= mysqli_num_rows($perintah); ?></span> , jika ingin melihat data mobil lebih detail, silahkan klik selengkapnya. </p>
            </div>
            <div class="rounded-bottom purple darken-4 text-center p-2">
               <ul class="list-unstyled list-inline font-small">
                  <li class="list-inline-item float-right pr-3 white-text">
                     <a href="v_kendaraan" class="text-white ml-auto">Selengkapnya <i class="fas fa-chevron-right pl-1"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <div class="col-md-3">
         <div class="card mt-4">
            <div class="card-body">
               <h4 class="card-title">
                  <?php
                  include('..\controller\koneksi.php');

                  $perintah = mysqli_query($konekdb, "SELECT * from sopir WHERE IdSopir != 8");
                  ?>
                  <b>
                     Data Sopir <i class="fas fa-user-tie float-right"></i>
                  </b>
               </h4>
               <hr>
               <p class="card-text">Data sopir sebanyak <span class="p-2 shadow-none badge badge-secondary"><?= mysqli_num_rows($perintah); ?></span>, jika ingin melihat data sopir lebih detail, silahkan klik selengkapnya.</p>
            </div>
            <div class="rounded-bottom purple darken-4 text-center p-2">
               <ul class="list-unstyled list-inline font-small">
                  <li class="list-inline-item float-right pr-3 white-text">
                     <a href="v_sopir" class="text-white ml-auto">Selengkapnya <i class="fas fa-chevron-right pl-1"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>

   </div>
</div>
<?php include '../templates/footer.php' ?>