function addToCart(idProduct) {
  var id = idProduct;
  var name = document.getElementById("productName").innerHTML;
  var checkbox = document.getElementsByName("color");
  for (var i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked === true) {
      var color = checkbox[i].value;
    }
  }
  var quantity = document.getElementById("quantity").value;
  var price = document.getElementById("price").innerHTML;
  totalPrice = quantity * price;
  var img = document.getElementById("productImg").src;

  var newItem = {
    id: id,
    name: name,
    img: img,
    color: color,
    quantity: quantity,
    price: price,
    totalPrice: totalPrice,
  };
  if (localStorage.getItem("data") == null) {
    localStorage.setItem("data", "[]");
  }
  var old_data = JSON.parse(localStorage.getItem("data"));
  var check = false;
  for (var i = 0; i < old_data.length; i++) {
    if (old_data[i].id === id && old_data[i].color === color) {
      old_data[i].quantity = Number(old_data[i].quantity) + Number(quantity);
      old_data[i].totalPrice = Number(old_data[i].quantity) * Number(old_data[i].price);
      check = true;
      localStorage.setItem("data", JSON.stringify(old_data));
    }
  }
  if (check == false) {
    old_data.unshift(newItem);
    localStorage.setItem("data", JSON.stringify(old_data));
  }

}
