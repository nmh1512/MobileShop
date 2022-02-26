if ($(".product").is(":checked")) {
    $("#product-switch").prop('checked', true);
}

// Kiểm tra switch quản lý sản phẩm có được bật không
$("#product-switch").change(function() {
    check();
})

check();

function check() {
    if (!$("#product-switch").is(":checked")) {
        $(".product").prop('checked', false);
        $(".product").prop('disabled', true);

    } else {
        $(".id1").prop('disabled', false);

    }
};

//Kiểm tra nút quyền xem sản phẩm
$(".id1").change(function() {
    if (!$(this).is(":checked")) {
        $(".product").prop('checked', false);
        $(".id2, .id3, .id4").prop('disabled', true);

    } else {
        $(".product").prop('disabled', false);

    }
})
if (!$(".id1").is(":checked")) {
    $(".product").prop('checked', false);
    $(".product").prop('disabled', true);

} else {
    $(".product").prop('disabled', false);

}