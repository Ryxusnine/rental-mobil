<?php
include('../controller/koneksi.php');
?>

<head>
   <title>Merk</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="../view/v_type" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Type</a>
               <a href="../view/v_merk" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Merk</a>
               <a href="../view/v_kendaraan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Kendaraan</a>
               <h4 class="h4 mt-2 ml-2">MERK</h4>
            </div>
         </div>
      </div>
      <?php if ($_SESSION['Login']['Posisi']==3):?>
      <div class="isiform bg-white mt-4 shadow-sm mb-5">
               <?php
               include 'alert.php'
               ?>
               <table id="dtbl" class="table table-hover mt-2">
                  <thead class="text-center">
                     <th>No.</th>
                     <th>Kode Merk</th>
                     <th>Nama Merk</th>
                  </thead>
                  <tbody>
                     <?php
                     include('../controller/koneksi.php');

                     $query = mysqli_query($konekdb, "select * from merk");
                     $a = 1;
                     while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="text-center">
                           <td><?php echo $a++; ?></td>
                           <td><?php echo $row['KdMerk']; ?></td>
                           <td><?php echo $row['NmMerk']; ?></td>
                           
                        </tr>
                        <!-- Modals Edit -->
                        <?php
                           include '../modals/m_merk.php'
                           ?>


                     <?php
                     }
                     ?>
                  </tbody>
               </table>
            </div>
      <?php elseif ($_SESSION['Login']['Posisi']==1 OR $_SESSION['Login']['Posisi']==2):?>
      <div class="row">
         <div class="col-9">
            <div class="isiform bg-white mt-4 shadow-sm mb-5">
               <?php
               include 'alert.php'
               ?>
               <table id="dtbl" class="table table-hover mt-2">
                  <thead class="text-center">
                     <th>No.</th>
                     <th>Kode Merk</th>
                     <th>Nama Merk</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     <?php
                     include('../controller/koneksi.php');

                     $query = mysqli_query($konekdb, "select * from merk");
                     $a = 1;
                     while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="text-center">
                           <td><?php echo $a++; ?></td>
                           <td><?php echo $row['KdMerk']; ?></td>
                           <td><?php echo $row['NmMerk']; ?></td>
                           <td>
                              <a href="#" data-toggle="modal" data-target="#editMerk<?php echo $a ?>" class="btn btn-primary shadow-none"><i class="fas fa-fw fa-edit"></i></a>
                              <a href="../functions/h_merk.php?KdMerk=<?= $row['KdMerk'] ?>" class="btn btn-danger shadow-none tombol-hapus"><i class="fas fa-fw fa-Trash"></i></a>
                           </td>
                        </tr>
                        <!-- Modals Edit -->
                        <?php
                           include '../modals/m_merk.php'
                           ?>


                     <?php
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>

         <div class="col-3">
            <div class="card-body mt-1">
               <div class="text-white bg-primary rounded shadow-sm">
                  <div class="card-header">
                     <h6 class="card-title text-center font-weight-bold mt-2 ">Tambah Data Merk</h6>
                  </div>

                  <div class="card-body bg-white text-dark rounded-bottom">
                     <form action="../functions/f_merk.php" method="post" role="form" name="forminput" id="forminput">
                        <div class="md-form">
                           <label for="km">Kode Merk</label>
                           <input type="text" name="KdMerk" id="km" class="form-control" autofocus></div>

                        <div class="md-form">
                           <label for="nm">Nama Merk</label>
                           <input type="text" name="NmMerk" id="nm" class="form-control">
                        </div>

                        <button type="submit" name="AddMerk" class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect">Tambah</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php include '../templates/footer.php' ?>
                  <?php endif;?>
</body>

</html>