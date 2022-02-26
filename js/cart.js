function view() {
  if (localStorage.getItem("data") != null) {
    var data = JSON.parse(localStorage.getItem("data"));

    let total = 0;
    if (data.length == 0) {
      $(".nologin-container").empty();
      $(".nologin-container").append(
        '<div class="text-center mx-auto mt-4 pt-4"><p style="font-size: 2rem;">Không có sản phẩm nào trong giỏ hàng, hãy đi mua sắm ngay !</p><a href="home.php" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a></div>'
      );
    } else {
      for (let i = 0; i < data.length; i++) {
        var name = data[i].name;
        var color = data[i].color;
        var quantity = data[i].quantity;
        var img = data[i].img;
        var totalPrice = data[i].totalPrice;
        total += Number(totalPrice);
        $("table").append(
          '<tr id="' +
            i +
            '"><td><img src="' +
            img +
            '" alt="" /></td><br><td><p class="tensanpham">' +
            name +
            '</p></td><td><p class="mausanpham">' +
            color +
            '</p></td><td><div onclick="update_minus(' +
            i +
            ')" style="font-size: 0.65rem;" class="p-1 minus btn btn-outline-primary border-none"><i class="fa-solid fa-minus"></i></div><input class="p-0" id="quantity' +
            i +
            '" type="text" readonly value="' +
            quantity +
            '" min="1" /><div onclick="update_plus(' +
            i +
            ')" style="font-size: 0.65rem;" class="p-1 plus btn btn-outline-primary"><i class="fa-solid fa-plus"></i></div></td><td><p class="price' +
            i +
            '">' +
            totalPrice +
            '</td><td><div onclick="remove(' +
            i +
            ')" class="delete"><a class="d-flex href=" #" "><i class=" fa-solid fa-circle-xmark"></i>Xóa</a></div></td></tr>'
        );
      }
      $(".total span").html(total);
      $(".grand-total span").html(total);
    }
  } else {
    $(".nologin-container").empty();
    $(".nologin-container").append(
      '<div class="text-center mx-auto mt-4 pt-4"><p style="font-size: 2rem;">Không có sản phẩm nào trong giỏ hàng, hãy đi mua sắm ngay !</p><a href="home.php" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a></div>'
    );
  }
}
view();
let total = Number($(".total span").html());
let grandTotal = Number($(".grand-total span").html());
function update_plus(i) {
  if (localStorage.getItem("data") != null) {
    var data = JSON.parse(localStorage.getItem("data"));
  }
  data[i].quantity++;
  data[i].totalPrice = data[i].price * data[i].quantity;
  $("#quantity" + i).val(data[i].quantity);
  $(".price" + i).html(data[i].totalPrice);
  $(".total span").html((total += Number(data[i].price)));
  $(".grand-total span").html((grandTotal += Number(data[i].price)));
  localStorage.setItem("data", JSON.stringify(data));
}
function update_minus(i) {
  if (localStorage.getItem("data") != null) {
    var data = JSON.parse(localStorage.getItem("data"));
  }
  data[i].quantity--;
  if (data[i].quantity < 1) {
    data[i].quantity = 1;
  } else {
    data[i].totalPrice = data[i].price * data[i].quantity;
    $("#quantity" + i).val(data[i].quantity);
    $(".price" + i).html(data[i].totalPrice);
    $(".total span").html((total -= Number(data[i].price)));
    $(".grand-total span").html((grandTotal -= Number(data[i].price)));
  }
  localStorage.setItem("data", JSON.stringify(data));
}
function remove(i) {
  if (localStorage.getItem("data") != null) {
    var data = JSON.parse(localStorage.getItem("data"));
  }
  var productTotal = data[i].totalPrice;
  $(".total span").html((total -= productTotal));
  $(".grand-total span").html((total -= productTotal));
  data.splice(i, 1);

  localStorage.setItem("data", JSON.stringify(data));
  if (data.length == 0) {
    $(".nologin-container").empty();
    $(".nologin-container").append(
      '<div class="text-center mx-auto mt-4 pt-4"><p style="font-size: 2rem;">Không có sản phẩm nào trong giỏ hàng, hãy đi mua sắm ngay !</p><a href="home.php" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a></div>'
    );
  }
  $("table").empty();
  view();
}
