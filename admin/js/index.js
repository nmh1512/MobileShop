$(document).ready(function() {
    thongke();
    var char = new Morris.Line({

        element: 'myfirstchart',

        xkey: 'date',

        ykeys: ['orders', 'sales', 'profit'],

        labels: ['Số đơn hàng', 'Doanh thu', 'Lợi nhuận']
    });

    function thongke() {
        $.ajax({
            url: "thongke.php",
            method: "post",
            dataType: "JSON",
            success: function(data) {
                char.setData(data);
            }
        });
    }
    $('.select-date').change(function() {
        var time = $(this).val();
        $.ajax({
            url: "thongke.php",
            method: "post",
            dataType: "JSON",
            data: {
                time: time
            },
            success: function(data) {
                char.setData(data);
            }
        });
    })

})

function fetch_data() {
    var text = $(".nav-product").html();
    $.ajax({
        url: "ajax/moreproduct.php",
        method: "post",
        data: {
            text: text
        },
        success: function(data) {
            $("#checkProduct").html(data);
            if (data == 'Chưa có sản phẩm nào sắp hết hàng') {
                $('#checkProduct').removeClass(checkProduct);
            }
        },
    });
}
fetch_data();
$('.nav-product').click(function() {
    $('.nav-product').removeClass('active');
    $(this).addClass('active');
    var text = $(this).html();
    $.ajax({
        url: "ajax/moreproduct.php",
        method: "post",
        data: {
            text: text
        },
        success: function(data) {
            $('#checkProduct').html(data);
            if ($('#data')) {
                if ($('#data').html() == 'Chưa có sản phẩm nào sắp hết hàng' || $('#data').html() == 'Chưa có sản phẩm nào bán chạy') {
                    $('#checkProduct').removeClass('checkProduct');
                } else {
                    $('#checkProduct').addClass('checkProduct');
                }
            }

        }
    });
})