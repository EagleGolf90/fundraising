function startAllOver() {
  $('#round').val("");
  $('#game').val("");
  $('#topTeam').val("");
}

function getNumberOfGames($rounds) {
  switch ($rounds) {
    case 1: return 32;
    case 2: return 16;
    case 3: return 8;
    case 4: return 4;
    case 5: return 2;
    case 6: return 1;
  }
}

function removeItems() {
  $('#game option').each(function (index, option) {
    if(index != 0)
    {
        $(this).remove();
    }
  });
}

$(document).ready(function() {
  $('#clearAll').click(function() {
    startAllOver();
  });

  // $('#submitForm').click(function() {
  //   let formData = $('.areaForm').serialize();

  //   $.ajax({
  //       method: "POST",
  //       url: 'https://kdga.org/fundraising/admin/update_teams.php',
  //       data: formData,
  //       success: function(response) {
  //         startAllOver();
  //         alert('Updated successful');
  //       },
  //       error: function(xhr, status, error) {
  //         alert('Failed');
  //       }
  //   });
  // });

  $('#round').change(function() {
    var numberOfGames = this.getNumberOfGames($('#round').val());
    this.removeItems();
    var options = document.forms['areaForm']['game'].options;
    for ($x = 1; $x <= 32; $x++) {
      if ($x <= numberOfGames) {
        options[$x].disabled = false;
      } else {
        options[$x].disabled = true;
      }
    }
  });
});
