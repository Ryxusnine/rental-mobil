<?php
include('../controller/koneksi.php');
?>

<head>
   <title>type</title>
</head>

<body>
   <?php
   include '../templates/sidenavbar.php'
   ?>
   <div class="container">
      <div class="bawah-navbar bg-white mt-4 shadow-sm p-2">
         <div class="panel panel-default">
            <div class="panel-heading">
               <a href="../view/v_type" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0">Type</a>
               <a href="../view/v_merk" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Merk</a>
               <a href="../view/v_kendaraan" class="rounded-pill float-right btn btn-custom btn-sm shadow-none mt-0" style="background:grey">Kendaraan</a>
               <h4 class="h4 mt-2 ml-2">TYPE</h4>
            </div>
         </div>
      </div>


      <div class="row">
         <div class="col-9">
            <div class="isiform bg-white mt-4 shadow-sm mb-5">
               <?php
               include 'alert.php'
               ?>
               <table id="dtbl" class="table table-hover mt-2">
                  <thead class="text-center" color:white;">
                     <th>No.</th>
                     <th>Id Type</th>
                     <th>Nama Type</th>
                     <th>Kode Merk</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     <?php
                     include('../controller/koneksi.php');

                     $query = mysqli_query($konekdb, "select * from view_type");
                     $a = 1;
                     while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="text-center">
                           <td><?php echo $a++; ?></td>
                           <td><?php echo $row['IdType']; ?></td>
                           <td><?php echo $row['NmType']; ?></td>
                           <td><?php echo $row['KdMerk']; ?></td>
                           <td>
                              <a href="#" data-toggle="modal" data-target="#edit<?php echo $a ?>" class="btn btn-primary shadow-none"> <i class="fas fa-fw fa-edit"></i></a>
                              <a href="../functions/h_type.php?IdType=<?= $row['IdType'] ?>" class="btn btn-danger shadow-none tombol-hapus"><i class="fas fa-fw fa-Trash"></i></a>
                           </td>
                        </tr>
                        <!-- Modals Edit -->
                        <?php
                           include '../modals/m_type.php'
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
               <div class="text-white purple darken-4 rounded shadow-sm">
                  <div class="card-header">
                     <h6 class="card-title text-center font-weight-bold mt-2 ">Tambah Data Type</h6>
                  </div>

                  <div class="card-body bg-white text-dark rounded-bottom">
                     <form action="../functions/f_type.php" method="post" role="form" name="forminput" id="forminput">
                        <div class="md-form">
                           <label for="kt">Id Type</label>
                           <input type="text" name="IdType" id="kt" class="form-control" autofocus>
                        </div>

                        <div class="md-form">
                           <label for="nt">Nama Type</label>
                           <input type="text" name="NmType" id="nt" class="form-control">
                        </div>

                        <div class="form-group">
                           <select class="mdb-select md-form colorful-select dropdown-info" name="KdMerk">
                              <option selected>Pilih Kode Merk</option>
                              <?php
                              $p = mysqli_query($konekdb, "SELECT * from merk");
                              while ($poken = mysqli_fetch_array($p)) {
                                 echo '<option>' . $poken['KdMerk'] . '</option>';
                              }
                              ?>
                           </select>
                        </div>

                        <button type="submit" name="AddType" class="btn btn-outline-secondary rounded-pill shadow-none btn-block waves-effect">Tambah</button>

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php include '../templates/footer.php' ?>
</body>


</html>