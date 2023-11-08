$(document).ready(function() {
  function getEvents() {
    $("#tableInfo tbody").empty();
    var formData = $('#formData').serialize();
    $.ajax({
        method: "POST",
        url: "../data/get_payments.php",
        data: formData,
        success: function(response) {
          var result = JSON.parse(response);
          var grand_total = 0;

          for (var i = 0; i < result.length; i++) {
            var fullName = result[i].fullName;
            var qty = result[i].qty;
            var cost = result[i].cost;
            var total = parseInt(result[i].total);

            var tr_str = "<tr>" +
                  "<td align='center'>" + fullName + "</td>" +
                  "<td align='center'>" + qty + "</td>" +
                  "<td align='center'>" + cost + "</td>" +
                  "<td align='center'>" + total + "</td>" +
                  "</tr>";
            grand_total += total;

            $("#tableInfo tbody").append(tr_str);
          }

          tr_str = "<tr>" +
              "<td align='right' colspan='3'><b>Grand Total</b></td>" +
              "<td align='center'>" + grand_total + "</td>" +
              "</tr>";
          $("#tableInfo tbody").append(tr_str);
        }
    });
  }

  $("button").on("click", function() { getEvents(); });
});
