//Slider
const rightBtn = document.querySelector(".btn-right");
const leftBtn = document.querySelector(".btn-left");
const imgNumber = document.querySelectorAll(".slider-content-left-top img");
let index = 0;

function setSlide(index) {
  removeActive();
  document.querySelector(".slider-content-left-top").style.right =
    index * 100 + "%";
  titleSlide[index].classList.add("active");
}
rightBtn.addEventListener("click", function () {
  index += 1;
  if (index > imgNumber.length - 1) {
    index = 0;
  }
  setSlide(index)
});

leftBtn.addEventListener("click", function () {
  index -= 1;
  if (index < 0) {
    index = imgNumber.length - 1;
  }
  setSlide(index)
  console.log(index);
});

///slider 1--------------------------------------------------------------------------

const titleSlide = document.querySelectorAll(".slider-content-left-bottom li");

titleSlide.forEach(function (title, index) {
  title.addEventListener("click", function () {
    setSlide(index);
  });
});

function removeActive() {
  const titleActive = document.querySelector(".slider-content-left-bottom .active");
  titleActive.classList.remove("active");
}


function slideAuto() {
  index += 1;
  if (index > imgNumber.length - 1) {
    index = 0;
  }
  setSlide(index)
}
setInterval(slideAuto, 5000)

