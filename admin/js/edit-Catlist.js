  $(document).ready(function () {
    $(document).on('click', 'a[data-role=update]', function () {
      var id = $(this).data('id');
      var tenDanhmuc = $('#'+id).children('td[data-target=tenDanhmuc]').text();

      $('#idDanhmuc').val(id);
      $('#tenDanhmuc').val(tenDanhmuc);
      $('#myModal').modal('toggle');
    });

    $('#save').on('click', function (e) {
      $(".modal-busy").show(); 
      e.preventDefault();
      var idDanhmuc = $('#idDanhmuc').val();
      var tenDanhmuc = $('#tenDanhmuc').val();

      $.ajax({
        url: 'ajax/editcategory.php',
        method: 'post',
        data: { idDanhmuc: idDanhmuc, tenDanhmuc: tenDanhmuc },
        success: function (data) {
          $('#'+idDanhmuc).children('td[data-target=tenDanhmuc]').text(tenDanhmuc);
          $(".modal-busy").hide(); 
          alert('Sửa dữ liệu thành công');
        }
      });
    });
  });