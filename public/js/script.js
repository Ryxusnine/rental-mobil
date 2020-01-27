// DATA TABLES
$(document).ready(function () {

  $("#dtbl").DataTable();
  //Rotaten Icon1
  $('.klikputar').on('click', function () {
    $('.terputar').toggleClass('rotate');
  });

  //Rotaten Icon2
  $('.klikputar2').on('click', function () {
    $('.terputar2').toggleClass('rotate');
  });

  //INPUT GAMBAR FIX LABEL
  $(".custom-file-input").on("change", function () {
    let filename = $(this)
      .val()
      .split("\\")
      .pop();
    $(this)
      .next(".custom-file-label")
      .addClass("selected")
      .html(filename);
  });
  //MATERIAL SELECT
  $('.mdb-select').materialSelect();


  //Fix Datatable
  $("select[name='dtbl_length']").addClass("d-inline");

  //Sweet Alert
  $('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
  });
});