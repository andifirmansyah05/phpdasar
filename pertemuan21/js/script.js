// jquery
$(document).ready(function () {
  // event saat input search diketik
  $("#keyword").on("keyup", function () {
    // munculkan gambar loader
    $("#loader").show();

    // eksekusi ajax
    $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val(), function (data) {
      // menganti daftar mahasiswa
      $("#daftar-mahasiswa").html(data);
      
      // menghilangkan gambar loader
      $("#loader").hide();
    });
  });
});
