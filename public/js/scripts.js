$(function () {
  $(".tampilModalUbah").on("click", function () {
    $("#judulModal").html("Ubah Data Rumah");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/celeng/public/rumah/ubah");

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/celeng/public/rumah/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#tipe").val(data.tipe);
        $("#alamat").val(data.alamat);
        $("#area").val(data.area);
        $("#harga").val(data.harga);
        $("#beds").val(data.beds);
        $("#baths").val(data.baths);
        $("#garages").val(data.garages);
        $("#backup").val(data.image);
        $("#id_rumah").val(data.id_rumah);
        $("#id_akun").val(data.id_akun);
        $("#status").val(data.status);
      },
    });
  });

  $(".tampilModalTambah").on("click", function () {
    $("#judulModal").html("Tambah Data Rumah");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $(".modal-body form").attr("action", "http://localhost/celeng/public/rumah/tambah");
    $.ajax({
      function() {
        $("#tipe").val();
        $("#alamat").val();
        $("#area").val();
        $("#harga").val();
        $("#beds").val();
        $("#baths").val();
        $("#garages").val();
        $("#id_rumah").val();
        $("#id_akun").val();
        $("#status").val();
      },
    });
  });

  // $(".tampilModalEditProfile").on("click", function () {
  //   $("#judulModal").html("Ubah Data Rumah");

  //   console.log("ok");
  //   const id = $(this).data("idAkun");
  //   $.ajax({
  //     url: "http://localhost/celeng/public/profile/getEditProfile",
  //     data: { id: id },
  //     method: "post",
  //     dataType: "json",
  //     success: function (data) {
  //       $("#nama_lengkap").val(data.nama_lengkap);
  //       $("#email").val(data.email);
  //       $("#phone").val(data.phone);
  //     },
  //   });
  // });
});
