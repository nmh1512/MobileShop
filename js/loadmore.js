$(document).ready(function () {
  var limit = 20;
  $(document).on("click", ".load-more", function (e) {
  var quantityProduct = $("#quantityProduct").html();
    e.preventDefault();
    if ($("#key") && $("#key").html() !== '') {
      var key = $("#key").html();
    }
    if ($("#idCat") && $("#idCat").val() !== '') {
      var idCat = $("#idCat").val();
    }
    if ($("#idBrand") && $("#idBrand").val() !== '') {
      var idBrand = $("#idBrand").val();
    }
    if ($("#pId") && $("#pId").val() !== '') {
      var pId = $("#pId").val();
      $("#pId").remove();
    }
    if ($("#queryDate") && $("#queryDate").val() !== '') {
      var queryDate = $("#queryDate").val();
    }
    if ($("#query") && $("#query").val() !== '') {
      var query = $("#query").val();
    }
$(this).data('id', 0);
    $(this).removeClass("brand-search");
    $(this).addClass("load-busy");
    $(this).prop("disabled", true);
    $.ajax({
      type: "POST",
      url: "ajax/loadmore.php",
      data: {
        key: key,
        idCat: idCat,
        idBrand: idBrand,
        pId: pId,
        limit: limit,
        query: query,
        queryDate: queryDate,
      },
      success: function (data) {
        quantityProduct = quantityProduct - limit;
        if (quantityProduct <= 0) {
          $(".load-more").hide();
        } else {
          $("#quantityProduct").html(quantityProduct);
        }
        $(".cartegory-list-content").append(data);
        $(".load-more").removeClass("load-busy");
        $(".load-more").addClass("brand-search");
        $(".load-more").removeAttr("disabled");
      },
    });
  });
});
