function fetch_data() {
  var display = $("#view option:selected").text();
  $(".modal-busy").show();  
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      display: display,
    },
    success: function (data) {
      $(".table-responsive").html(data);
      $(".modal-busy").hide();
    },
  });
}
fetch_data();
$("#view").change(function () {
  var display = $("#view option:selected").text();
  $(".modal-busy").show();    
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      display: display,
    },
    success: function (data) {
      $(".table-responsive").html(data);
      $(".modal-busy").hide();

    },
  });
});

function removeOrder(str) {
  var removeId = str;
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      removeId: removeId,
    },
    success: function (data) {
      fetch_data();
    },
  });
}
function confirmOrder(str) {
  var confirmId = str;
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      confirmId: confirmId,
    },
    success: function (data) {
      fetch_data();

    },
  });
}
function shiping(str) {
  var shipingId = str;
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      shipingId: shipingId,
    },
    success: function (data) {
      fetch_data();
    },
  });
}

function complete(str) {
  var complete = str;
  $.ajax({
    type: "POST",
    url: "ajax/loadorder.php",
    data: {
      complete: complete,
    },
    success: function (data) {
      $('#status'+complete).html('Đã hoàn thành');
      $('#cpl'+complete).remove();
      fetch_data();
    },
  });
}
