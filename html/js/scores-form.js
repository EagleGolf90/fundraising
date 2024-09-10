function startAllOver() {
  $('#rounds').val("");
  $('#game').val("");
  $('#winningTeam').val("");
  $('#losingTeam').val("");
  $('#winningScore').val("");
  $('#losingScore').val("");
}

function getNumberOfGames(rounds) {
  switch (parseInt(rounds)) {
    case 1: return 32;
    case 2: return 16;
    case 3: return 8;
    case 4: return 4;
    case 5: return 2;
    case 6: return 1;
    default: return 0;
  }
}

$('#submitForm').click(function() {
  let formData = $('.areaForm').serialize();

  $.ajax({
      method: "POST",
      url: 'https://kdga.org/fundraising/admin/update_ncaa_team.php',
      data: formData,
      success: function(response) {
        startAllOver();
        alert('Updated successful');
      },
      error: function(xhr, status, error) {
        alert('Failed');
      }
  });
});

$('#clearAll').click(function() {
  startAllOver();
});

$("#rounds").change(function() {
  $('#game').val("1");
  var rounds = $('#rounds').val();
  var numberOfGames = getNumberOfGames(rounds);
  var options = document.forms['areaForm']['game'].options;
  for (var x = 1; x < options.length; x++) {
    if (x <= numberOfGames) {
      options[x].disabled = false;
    } else {
      options[x].disabled = true;
    }
  }
});
