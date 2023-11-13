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

  function IsFieldNotBlank(fieldName) { return $('#' + fieldName).val() != ''; }

  function IsAllSelectionSet() {
    var all_flag = false;
    alert('starts here');
    if (IsFieldNotBlank('yearPicked') && 
         IsFieldNotBlank('eventType') &&
         IsFieldNotBlank('poolNumber')) all_flag = true;
    alert('ends here');
    return all_flag;
  }

  $("button").on("click", function() {
    if (IsAllSelectionSet()) {
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
    } else {
      alert('Any or all dropdown list must be selected before submit. Please try again.');
    }
  });
});
