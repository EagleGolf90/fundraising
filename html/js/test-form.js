$(document).ready(function() {
  function getEvents() {
    var bu = $('#bu').val();
    $.ajax({
        method: "GET",
        url: "get_test.php?bu=" + bu,
        success: function(response) {
          var len = response.length;

          for (var i = 0; i < len; i++) {
            var id = response[i].id;
            var description = response[i].description;
            var sports = response[i].sports;
            var acronyms = response[i].acronyms;

            var tr_str = "<tr>" +
                  "<td align='center'>" + id + "</td>" +
                  "<td align='center'>" + description + "</td>" +
                  "<td align='center'>" + sports + "</td>" +
                  "<td align='center'>" + acronyms + "</td></tr>";

            $("#tableInfo tbody").append(tr_str);
          }
        }
    });
  }

  $("button").on("click", function() {
    /*alert('Click here');*/
    getEvents();
  });
});
