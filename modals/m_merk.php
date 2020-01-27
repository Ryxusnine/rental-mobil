<div class="modal fade" id="editMerk<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title white-text w-100 font-weight-bold">Ubah Data Sopir</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
            </button>
         </div>

         <!--Body-->
         <div class="modal-body">
            <form action="../functions/f_merk.php" method="post" role="form">
               <div class="form-group">
                  <label>Kode Merk</label>
                  <input class="form-control" type="text" name="km" value="<?php echo $row['KdMerk']; ?>" readonly></div>

               <div class="form-group">
                  <label>Nama Merk</label>
                  <input class="form-control" type="text" name="nm" value="<?php echo $row['NmMerk']; ?>"></div>

               <div class="modal-footer justify-content-center">
                  <button type="submit" name="editMerk" class="btn btn-outline-warning">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>