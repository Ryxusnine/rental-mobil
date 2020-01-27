<div class="modal fade" id="editKen<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title white-text w-100 font-weight-bold">Ubat Data Kendaraan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
            </button>
         </div>

         <!--Body-->
         <div class="modal-body">
            <form method="POST" action="../functions/u_kendaraan.php" enctype="multipart/form-data">

               <input type="hidden" name="IdKendaraan" class="form-control" value="<?php echo $row['IdKendaraan']; ?>">

               <div class="form-group">
                  <label>NoPlat</label>
                  <input type="text" name="NoPlat" value="<?php echo $row['NoPlat']; ?>" class="form-control" readonly></div>

               <div class="form-group">
                  <label>Kode Merk</label>
                  <input type="text" name="KdMerk" id="KdMerk" class="form-control" value="<?php echo $row['KdMerk']; ?>" disabled></div>

               <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="IdType" id="IdType" class="form-control" value="<?php echo $row['IdType']; ?>" disabled></div>

               <div class="form-group">
                  <label>Harga Sewa</label>
                  <input type="text" name="HargaSewa" id="HargaSewa" class="form-control" value="<?php echo $row['HargaSewa']; ?>"></div>

               <div class="form-group">
                  <label>Foto Mobil</label>
                  <div class="input-group mb-3">
                     <div class="custom-file">
                        <input type="file" name="FotoMobil" class="custom-file-input" id="fm">
                        <label class="custom-file-label" for="inputFotoMobil" aria-describedby="inputFotoMobil"><?php echo $row['FotoMobil']; ?></label></div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="submit" name="editKen" class="btn btn-outline-warning btn-block">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>