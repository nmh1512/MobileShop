$(document).ready(function(){
    $("#id_danhmuc").change(function(){
  
      var x = $(this).val()
      $.get ("ajax/productlist_ajax.php", {id_danhmuc:x}, function(data) {
        $("#id_loaisanpham").html(data);
      })
    })
  })





  $('#add_color').on('click', function(){
    var color = $('#color').val();
    if (color == '') {
      alert("Bạn chưa điền tên màu !");
    } else {
      $.ajax({
        url: "C:/xampp/htdocs/baitap/DATN/admin/ajax/addcolor_ajax.php",
        method: "POST",
        data:{color:color},
        // success:function(data){
        //   if($data == 1) {
        //     alert("thanh cong");
        //   } else {
        //     alert("that bai");
        //   }
          
        // }

      });
    }
  });