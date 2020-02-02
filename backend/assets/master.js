$(document).ready(function(){
    $("select.select-produk").change(function(){
        var selectedProduct = $(this).children("option:selected").val();
        $('#id_prod').val(selectedProduct);
    });
});

$('.select-produk, .select-kategori, .select-unit, .customer, #pemilik, #edit_pemilik').select2({
  theme: 'bootstrap4'
});

$(function () {
  $('#produkTable').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Semua"]],
    "order": [[ 0, "desc" ]],
    "language": {
      "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
    }
  });
});

$(function () {
  $('#detailTable').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "lengthMenu": [[5, 10], [5, 10]],
    "order": [[ 0, "desc" ]],
    "language": {
      "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
    }
  });
});

$(function () {
  $('#keluarTable').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "lengthMenu": [[5, 10], [5, 10]],
    "order": [[ 0, "desc" ]],
    "language": {
      "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
    }
  });
});

$(document).ready( function() {
    $(document).on('click', '#edit-produk', function() {
        var edit_idprod = $(this).data('id');
        var nama_produk = $(this).data('nama_produk');
        var nama_kategori = $(this).data('nama_kategori');
        var nama_unit = $(this).data('nama_unit');
        var harga = $(this).data('harga_jual');

        $('#editproduk').val(nama_produk);
        $('#edit_idprod').val(edit_idprod);
        $('#editkategori option:selected').val(nama_kategori);
        $('#editunit').val(nama_unit);
        $('#harga').val(harga);
    })
});

$(document).ready( function() {
    $(document).on('click', '#edit-penitipan', function() {
        var edit_id = $(this).data('id');
        var edit_nama_peliharaan = $(this).data('nama_peliharaan');
        var edit_id_pemilik = $(this).data('id_pemilik');
        var edit_catatan = $(this).data('catatan');

        $('#edit_id').val(edit_id);
        $('#edit_nama_peliharaan').val(edit_nama_peliharaan);
        $('#edit_pemilik').val(edit_id_pemilik);
        $('#edit_catatan').val(edit_catatan);
    })
});

$(document).ready( function() {
  $(document).on('click', '#edit-pelanggan', function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var telepon = $(this).data('telepon');
    var alamat = $(this).data('alamat');

    $('#id_plg').val(id);
    $('#editpelanggan').val(nama);
    $('#edittelepon').val(telepon);
    $('#editalamat').val(alamat);
  });
});

$(document).ready( function() {
  $(document).on('click', '#edit-karyawan', function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var alamat = $(this).data('alamat');
    var telepon = $(this).data('telepon');
    var email = $(this).data('email');

    $('#id_karyawan').val(id);
    $('#editkaryawan').val(nama);
    $('#editalamat').val(alamat);
    $('#edittelepon').val(telepon);
    $('#editemail').val(email);
  });
});

$(document).ready( function() {
  $(document).on('click', '#edit-pengguna', function() {
    var id = $(this).data('id');
    var id_karyawans = $(this).data('id_karyawans');
    var username = $(this).data('username');
    // var password = $(this).data('password');

    $('#id_pengguna').val(id);
    $('#editid_karyawan').val(id_karyawans);
    $('#editusername').val(username);
    // $('#editpassword').val(password);
  });
});

$(document).ready( function() {
    $(document).on('click', '#edit-kategori', function() {
        var id_kategori = $(this).data('id');
        var nama_kategori = $(this).data('nama_kategori');
        var status = $(this).data('status');

        $('#id_kategori').val(id_kategori);
        $('#editkategori').val(nama_kategori);
        if (status == 1) {
          document.getElementById("editstatus").checked = true;
          document.getElementById("editstatus").value = status;
        } else {
          document.getElementById("editstatus").checked = false;
          document.getElementById("editstatus").value = status;
        }
    })
});

$(document).ready( function() {
    $(document).on('click', '#edit-unit', function() {
        var id_unit = $(this).data('id');
        var nama_unit = $(this).data('nama_unit');
        var status = $(this).data('status');

        $('#id_unit').val(id_unit);
        $('#editunit').val(nama_unit);
        if (status == 1) {
          document.getElementById("editstatus").checked = true;
          document.getElementById("editstatus").value = status;
        } else {
          document.getElementById("editstatus").checked = false;
          document.getElementById("editstatus").value = status;
        }
    })
});

$(document).ready( function() {
  $(document).on('click', '#editstatus', function() {
    var checked = document.getElementById("editstatus").checked;
    if (checked) {
      document.getElementById("editstatus").value = 1;
    } else {
      document.getElementById("editstatus").value = 0;
    }
  })
});

$(document).ready( function() {
  $(document).on('click', '#status', function() {
    var checked = document.getElementById("status").checked;
    if (checked) {
      document.getElementById("status").value = 1;
    } else {
      document.getElementById("status").value = 0;
    }
  })
});

const flashData = $('.sukses-produk').data('suksesproduk');

if (flashData) {
    toastr.success(flashData);
};

const flashDataGagal = $('.gagal-produk').data('gagalproduk');

if (flashDataGagal) {
    toastr.error(flashDataGagal);
};

// $('#customer').keyup(function() {
//   update();
// });

// function update() {
//   document.getElementById('customers').value($('#customer').val());
// };

$('#customer').change( function() {
  $('#customers').val($(this).val())
});

