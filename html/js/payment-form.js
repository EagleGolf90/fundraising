$(document).ready(function() {
  function getEvents() {
    $("#tableInfo tbody").empty();
    var formData = $('#formData').serialize();
    $.ajax({
        method: "POST",
        url: "../data/get_payments.php",
        data: formData,
        success: function(response) {
            $("#tableInfo tbody").append(response);
        }
    });
  }

  $("button").on("click", function() { getEvents(); });
});
