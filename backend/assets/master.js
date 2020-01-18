$(document).ready(function(){
    $("select.select-produk").change(function(){
        var selectedProduct = $(this).children("option:selected").val();
        $('#id_prod').val(selectedProduct);
    });
});

$('.select-produk, .select-kategori, .select-unit').select2({
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

        $('#editproduk').val(nama_produk);
        $('#edit_idprod').val(edit_idprod);
        $('#editkategori').val(nama_kategori);
        $('#editunit').val(nama_unit);
    })
});

const flashData = $('.sukses-produk').data('suksesproduk');

if (flashData) {
    toastr.success(flashData);
}