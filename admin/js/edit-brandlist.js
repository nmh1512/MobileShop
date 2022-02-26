$(document).ready(function() {
    $(document).on('click', 'a[data-role=update]', function() {
      var id = $(this).data('id');
      var tenDanhmuc = $('#' + id).children('td[data-target=tenDanhmuc]').html();
      var tenLoaisanpham = $('#' + id).children('td[data-target=tenLoaisanpham]').text();


      $('#idLoaisanpham').val(id);
      $('#tenDanhmuc').html(tenDanhmuc);
      $('#tenLoaisanpham').val(tenLoaisanpham);
      $('#myModal').modal('toggle');

    });

    $('#save').on('click', function(e) {
      $(".modal-busy").show();
      e.preventDefault();
      var idLoaisanpham = $('#idLoaisanpham').val();
      var tenDanhmuc = $('#tenDanhmuc').html();
      var tenLoaisanpham = $('#tenLoaisanpham').val();

      $.ajax({
        url: 'ajax/editcategory.php',
        method: 'post',
        data: {
          idLoaisanpham: idLoaisanpham,
          tenDanhmuc: tenDanhmuc,
          tenLoaisanpham: tenLoaisanpham
        },
        success: function(response) {
          $('#' + idLoaisanpham).children('td[data-target=tenDanhmuc]').html(tenDanhmuc)
          $('#' + idLoaisanpham).children('td[data-target=tenLoaisanpham]').text(tenLoaisanpham)
          $(".modal-busy").hide();
          alert('Sửa dữ liệu thành công');
        }
      });
    });
  });