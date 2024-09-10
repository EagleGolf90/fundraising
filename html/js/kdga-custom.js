/*
 * Program Name..: kdga-custom.js
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 * Description...: This is to execute the handles and behaviors attached to the couple of elements.
 */
$(document).ready(function() {
    $("#hide_top_area").click(function() {
      alert('Hide Top Area function');
    });

    $(".available").click(function() {
        if ($(this).hasClass("selected")) {
          $(this).removeClass("selected");
        } else {
          $(this).addClass("selected");
        }

        var boxSelected = "";
        $(".selected").each(function(index) {
          if (boxSelected !== "") boxSelected = boxSelected + ",";
          boxSelected = boxSelected + $(this).text();
        });
        $("#boxSelected").val(boxSelected);
    });
});
