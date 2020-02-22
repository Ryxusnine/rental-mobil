 <!-- alert  -->
 <div class="mt-2">
    <script src="..\public\vendor\SweetAlert2\dist\sweetalert2.all.min.js"></script>
    <?php
      // alert edit data
      if (isset($_GET['edit_sukses'])) {
         echo '<script>Swal.fire("Berhasil","Data berhasil diubah","success")</script>';
      }

      //alert tambah data
      if (isset($_GET['sukses_add'])) {
         echo '<script>Swal.fire("Berhasil","Data berhasil ditambah","success")</script>';
      }
      if (isset($_GET['batal'])) {
         echo '<script>Swal.fire("Berhasil Dibatalkan","Pemesanan Mobil Dibatalkan","success")</script>';
      }
      if (isset($_GET['ambil'])) {
         echo '<script>Swal.fire("Kendaraan Diambil","Kendaraan Siap Digunakan","success")</script>';
      }
      if (isset($_GET['selesai'])) {
         echo '<script>Swal.fire("Rental Selesai","Terima Kasih Telah Menggunakan Jasa Kami","success")</script>';
      }
      ?>
 </div>