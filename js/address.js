



if ((address_2 = localStorage.getItem("address_2_saved"))) {
    $('select[name="district"] option').each(function () {
      if ($(this).text() == address_2) {
        $(this).attr("selected", "");
      }
    });
    $("input.billing_address_2").attr("value", address_2);
  }
  if ((district = localStorage.getItem("district"))) {
    $('select[name="district"]').html(district);
    $('select[name="district"]').on("change", function () {
      var target = $(this).children("option:selected");
      target.attr("selected", "");
      $('select[name="district"] option')
        .not(target)
        .removeAttr("selected");
      address_2 = target.text();
      $("input.billing_address_2").attr("value", address_2);
      // district = $('select[name="district"]').html();
      // localStorage.setItem("district", district);
      localStorage.setItem("address_2_saved", address_2);
    });
  }
  $('select[name="city"]').each(function () {
    var $this = $(this),
      stc = "";
    c.forEach(function (i) {
      stc += '<option value="' + i + '">' + i + "</option>";
      $this.html('<option>Tỉnh / Thành phố</option>' + stc);
      if ((address_1 = localStorage.getItem("address_1_saved"))) {
        $('select[name="city"] option').each(
          function () {
            if ($(this).text() == address_1) {
              $(this).attr("selected", "");
            }
          }
        );
        $("input.billing_address_1").attr("value", address_1);
      }
      $this.on("change", function (i) {
        i = $this.children("option:selected").index() - 1;
        var str = "",
          r = $this.val();
        if (r != "") {
          arr[i].forEach(function (el) {
            str += '<option value="' + el + '">' + el + "</option>";
            $('select[name="district"]').html(
              '<option>Quận / Huyện</option>' + str
            );
          });
          // var address_1 = $this.children("option:selected").text();
          // var district = $('select[name="district"]').html();
          // localStorage.setItem("address_1_saved", address_1);
          // localStorage.setItem("district", district);
          $('select[name="district"]').on(
            "change",
            function () {
              var target = $(this).children("option:selected");
              target.attr("selected", "");
              $('select[name="district"] option')
                .not(target)
                .removeAttr("selected");
              var address_2 = target.text();
              $("input.billing_address_2").attr("value", address_2);
              // district = $('select[name="district"]').html();
              // localStorage.setItem("district", district);
              localStorage.setItem("address_2_saved", address_2);
            }
          );
        } else {
          $('select[name="district"]').html(
            '<option value="">Quận / Huyện</option>'
          );
          // district = $('select[name="district"]').html();
          // localStorage.setItem("district", district);
          localStorage.removeItem("address_1_saved", address_1);
        }
      });
    });
  });

 