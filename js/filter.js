if ($("#idBrand")) {
  var idBrand = $("#idBrand").val();
}
if ($("#idCat")) {
  var idCat = $("#idCat").val();
}
if ($("#key")) {
  var key = $("#key").html();
  var filterSearch = "filterSearch";
}

$(".search-top").click(function () {
  $(".modal-busy").show();
  $(".search-top").removeClass("selectedd");
  $(this).addClass("selectedd");
  var count = $(this).attr("data-count");
  var text = $(this).html();
  var x = text.indexOf("(");
  var brand = text.slice(0, x - 1);
  $(".load-more").attr("data-quantity", count);
  $.ajax({
    type: "POST",
    url: "ajax/filter.php",
    data: {
      brand: brand,
      key: key,
      count: count,
    },
    success: function (data) {
      $(".content-load").html(data);
      check();
      checkData();
      checkQuantity();
      $(".modal-busy").hide();
    },
  });
});

$(".option").click(function () {
  $(".modal-busy").show();
  $("#removeFilterPrice").remove();
  var queryDate = $("#queryDate").val();
  var textOption = $(this).html();
  $("#selectText").html(textOption);
  $(".option").removeClass("line");
  $(this).addClass("line");
  if ($("#queryDate").val() !== "") {
    var queryDate = $("#queryDate").val();
    data = {
      idBrand: idBrand,
      idCat: idCat,
      text: textOption,
      queryDate: queryDate,
      key: key,
      filterSearch: filterSearch,
    };
  } else {
    data = {
      idBrand: idBrand,
      idCat: idCat,
      text: textOption,
      key: key,
      filterSearch: filterSearch,
    };
  }
  $.ajax({
    type: "POST",
    url: "ajax/filter.php",
    data: data,
    success: function (data) {
      $(".cartegory-list-content").html(data);

      $(".price-filter").append(
        '<div><button onclick="removeFilterPrice()" id="removeFilterPrice" style="border-radius: 0; font-size: 0.8rem;" class="w-100 btn btn-danger">Bỏ chọn</button></div>'
      );
      $("#query").val($("#queryDelete").val());
      if ($("#queryDateDelete").val()) {
        $("#queryDate").val($("#queryDateDelete").val());
        $("#queryDateDelete").remove();
      }
      $("#queryDelete").remove();

      check();
      checkData();
      checkQuantity();
      $(".modal-busy").hide();
    },
  });
});

$(".option1").click(function () {
  $(".modal-busy").show();
  $("#removeFilterPrice1").remove();
  var textOption = $(this).html();
  $(".option1").removeClass("line");
  $("#selectText1").html(textOption);
  $(this).addClass("line");
  if ($("#query").val() !== "") {
    var query = $("#query").val();
    data = {
      idBrand: idBrand,
      idCat: idCat,
      text1: textOption,
      query: query,
      key: key,
      filterSearch: filterSearch,
    };
  } else {
    data = {
      idBrand: idBrand,
      idCat: idCat,
      text1: textOption,
      key: key,
      filterSearch: filterSearch,
    };
  }
  $.ajax({
    type: "POST",
    url: "ajax/filter.php",
    data: data,
    success: function (data) {
      $(".cartegory-list-content").html(data);
      $(".price-filter1").append(
        '<div><button onclick="removeFilterPrice1()" id="removeFilterPrice1" style="border-radius: 0; font-size: 0.8rem;" class="w-100 btn btn-danger">Bỏ chọn</button></div>'
      );
      $("#queryDate").val($("#queryDateDelete").val());
      if ($("#queryDelete").val()) {
        $("#query").val($("#queryDelete").val());
        $("#queryDelete").remove();
      }
      check();
      checkData();
      checkQuantity();
      var x = $('.load-more').data('quantity');
      x = x - 20; 
      $('#quantityProduct').html(x);

      $("#queryDateDelete").remove();
      $(".modal-busy").hide();
    },
  });
});

function removeFilterPrice() {
  $(".modal-busy").show();
  $("#selectText").html("Giá");
  $(".option").removeClass("line");
  var removePrice = "removePrice";
  if ($("#queryDate").val() !== "") {
    var queryDate = $("#queryDate").val();
    data = {
      removePrice: removePrice,
      idBrand: idBrand,
      idCat: idCat,
      queryDate: queryDate,
      key: key,
      filterSearch: filterSearch,
    };
  } else {
    data = {
      removePrice: removePrice,
      idBrand: idBrand,
      idCat: idCat,
      key: key,
      filterSearch: filterSearch,
    };
  }
  $.ajax({
    type: "POST",
    url: "ajax/filter.php",
    data: {
      removePrice: removePrice,
      idBrand: idBrand,
      idCat: idCat,
      queryDate: queryDate,
      key: key,
      filterSearch: filterSearch,
    },
    success: function (data) {
      $(".cartegory-list-content").html(data);
      $("#removeFilterPrice").remove();
      $("#query").val("");
     
      var x = $('.load-more').data('quantity');
      x = x - 20; 
      $('#quantityProduct').html(x);
      check();
      checkData();
      checkQuantity();
      $(".modal-busy").hide();
    },
  });
}

function removeFilterPrice1() {
  $(".modal-busy").show();
  $("#selectText1").html("Sắp xếp theo");
  $(".option1").removeClass("line");
  var removePrice1 = "removePrice1";
  if ($("#query").val() !== "") {
    var query = $("#query").val();
    data = {
      removePrice1: removePrice1,
      idBrand: idBrand,
      idCat: idCat,
      query: query,
      key: key,
      filterSearch: filterSearch,
    };
  } else {
    data = {
      removePrice1: removePrice1,
      idBrand: idBrand,
      idCat: idCat,
      key: key,
      filterSearch: filterSearch,
    };
  }
  $.ajax({
    type: "POST",
    url: "ajax/filter.php",
    data: data,
    success: function (data) {
      $(".cartegory-list-content").html(data);
      $("#removeFilterPrice1").remove();
      $("#queryDate").val("");

      var x = $('.load-more').data('quantity');
      x = x - 20; 
      $('#quantityProduct').html(x);
      check();
      checkData();
      checkQuantity();
      $(".modal-busy").hide();
    },
  });
}
function check() {
  var check = $("#check").html();
  if (check == "Không có kết quả") {
    $(".load-more").hide();
  }
}
function checkData() {
  var checkData = $("#checkData").val();
  if ($("#checkData").data("id")) {
    var num = $("#checkData").data("id");
    num = num - 20;
    $("#quantityProduct").html(num);
  }
  if (checkData == 0) {
    $(".load-more").hide();
  } else {
    $(".load-more").show();
  }
  $("#checkData").remove();
}
function checkQuantity() {
  if($('#quantityProduct').html() <= 0) {
    $(".load-more").hide();

  }
}