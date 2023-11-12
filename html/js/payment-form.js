$(document).ready(function() {
  function getEvents(url_link) {
    $("#tableInfo tbody").empty();
    var formData = $('#formData').serialize();
    $.ajax({
        method: "POST",
        url: url_link,
        data: formData,
        success: function(response) {
            $("#tableInfo tbody").append(response);
        }
    });
  }

  $("button").on("click", function() {
    var url_link = '';
    switch (this.id) { 
      case 'btnPayments': 
        url_link = '../data/get_payments.php';
        break;
      case 'btnParticipants':
        url_link = '../data/get_participants.php';
        break;
      case 'btnPicks':
        url_link = '../data/get_squares_pick.php';
        break;
    }
    getEvents(url_link);
  });
});
