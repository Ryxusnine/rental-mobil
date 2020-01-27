<div class="modal fade" id="editK<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-notify modal-warning" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title white-text w-100 font-weight-bold">Ubah Data Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
            </button>
         </div>

         <!--Body-->
         <div class="modal-body">
            <form action="../functions/u_karyawan.php" method="post" role="form" enctype="multipart/form-data">

               <div class="form-group">
                  <label>NIK</label>
                  <input class="form-control" type="text" name="NIK" value="<?php echo $row['NIK']; ?>" readonly></div>

               <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="nm" value="<?php echo $row['nama']; ?>"></div>

               <div class="form-group">
                  <label>Nama User</label>
                  <input class="form-control" type="text" name="nmu" value="<?php echo $row['nama_user']; ?>" readonly></div>

               <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="text" name="ps"></div>

               <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control browser-default" type="text" name="jk">
                     <option value="L" <?php if ($row['JenisKelamin'] == 'L') {
                                          echo 'selected';
                                       } ?>>Laki-laki</option>
                     <option value="P" <?php if ($row['JenisKelamin'] == 'P') {
                                          echo 'selected';
                                       } ?>>Perempuan</option>
                  </select></div>

               <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control" type="text" name="almt" value="<?php echo $row['Alamat']; ?>"></div>

               <div class="form-group">
                  <label>Telepon</label>
                  <input class="form-control" type="text" name="telp" value="<?php echo $row['telepon']; ?>"></div>

               <div class="form-group">
                  <label>Foto Karyawan</label>
                  <div class="input-group mb-3">
                     <div class="custom-file">
                        <input type="file" name="FotoKaryawan" class="custom-file-input" id="fm">
                        <label class="custom-file-label" for="inputFotoKaryawan" aria-describedby="inputFotoKaryawan"><?php echo $row['Foto']; ?></label></div>
                  </div>
               </div>

         </div>
         <div class="modal-footer justify-content-center">
            <button type="submit" name="editKaryawan" class="btn btn-outline-warning btn-block">Update</button>
         </div>
         </form>
      </div>
   </div>
</div>