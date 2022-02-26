// --------------PRODUCT---------------
const bigImg = document.querySelector(".product-content-left-big-img img");
const smallImg = document.querySelectorAll(".product-color .color img");
smallImg.forEach(function (imgItem) {
  imgItem.addEventListener("click", function () {
    bigImg.src = imgItem.src;
  });
});

const radio = document.querySelectorAll(".radio-box");
const btnRadio = document.querySelectorAll(".btn-radio");
for (let i = 0; i < btnRadio.length; i++) {
  btnRadio[i].addEventListener("click", function () {
    radio[i].checked = true;
  });
}

const quantity = document.querySelector(".quantity");
const minus = document.querySelector(".minus");
const plus = document.querySelector(".plus");

let qty = quantity.value;

minus.addEventListener("click", function () {
  quantity.value--;
  if (quantity.value <= 1) {
    quantity.value = 1;
  }
});
plus.addEventListener("click", function () {
  quantity.value++;
});
