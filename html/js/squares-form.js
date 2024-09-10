function startAllOver() {
  $('#quarter').val("");
  for (var i = 1; i <= 10; i++) {
    $('#left_column' + i).val("");
    $('#top_column' + i).val("");
  }
}

$(document).ready(function() {
  $('#clearAll').click(function() {
    startAllOver();
  });

  $('#submitForm').click(function() {
    var quarter = $('#quarter :selected').text();
    var formData = $('.areaForm').serialize();

    $.ajax({
        method: "POST",
        url: 'https://kdga.org/fundraising/squares/add_draw_squares.php',
        data: formData,
        success: function(response) {
          alert(quarter + ' updated successful');
          startAllOver();
        },
        error: function(xhr, status, error) {
          alert('Failed, Status: ' + status);
        }
    });
  });
});
