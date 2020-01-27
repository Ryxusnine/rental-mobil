<div class="modal fade" id="edit<?php echo $a ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title white-text w-100 font-weight-bold">Ubah Data Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
            </button>
         </div>

         <!--Body-->
         <div class="modal-body">
            <form action="../functions/f_type.php" method="post" role="form">
               <div class="form-group">
                  <label>Id Type</label>
                  <input class="form-control" type="text" name="it" value="<?php echo $row['IdType']; ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Nama Type</label>
                  <input class="form-control" type="text" name="nt" value="<?php echo $row['NmType']; ?>">
               </div>

               <div class="form-group">
                  <label>Kode Merk</label>
                  <select class="browser-default custom-select" name="KdMerk" id="KdMerk">
                     <?php
                     $merk = mysqli_query($konekdb, "SELECT * FROM merk");
                     while ($merkO = mysqli_fetch_array($merk)) :
                     ?>
                        <option value="<?= $merkO['KdMerk'] ?>" <?php if ($merkO['KdMerk'] == $row['KdMerk']) echo "selected"; ?>>
                           <?= $merkO['NmMerk'] ?>
                        </option>
                     <?php endwhile; ?>
                  </select>
               </div>

               <div class="modal-footer justify-content-center">
                  <button type="submit" name="edit" class="btn btn-outline-warning">Update</button>
               </div>

            </form>
         </div>
      </div>
   </div>
</div>