<div class="modal fade" id="updtSpr<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-notify modal-warning" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title white-text w-100 font-weight-bold">Ubah Data Sopir</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
            </button>
         </div>

         <!--Body-->
         <div class="modal-body">
            <form action="../functions/f_sopir.php" method="post" role="form">
               <div class="form-group">
                  <label>Id Sopir</label>
                  <input class="form-control" type="text" name="IdSopir" value="<?php echo $row['IdSopir']; ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Nama Sopir</label>
                  <input class="form-control" type="text" name="NmSopir" value="<?php echo $row['NmSopir']; ?>">
               </div>

               <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control" type="text" name="alamat" value="<?php echo $row['alamat']; ?>">
               </div>

               <div class="form-group">
                  <label>Telepon</label>
                  <input class="form-control" type="text" name="telepon" value="<?php echo $row['telepon']; ?>">
               </div>

               <div class="form-group">
                  <label>No.Sim</label>
                  <input class="form-control" type="text" name="NoSim" value="<?php echo $row['NoSim']; ?>">
               </div>

               <div class="form-group">
                  <label>Tarif/hari</label>
                  <input class="form-control" type="text" name="TarifPerhari" value="<?php echo $row['TarifPerhari']; ?>">
               </div>
         </div>

         <div class="modal-footer justify-content-center">
            <button type="submit" name="updtSpr" class="btn btn-outline-warning">Update</button>
         </div>
         </form>
      </div>
   </div>
</div>