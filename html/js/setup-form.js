/*
 * Program Name..: setup-form.js
 * Author........: Brian Timberlake
 * Date Created..: December 26, 2022
 * Description...: To execute the handles and behaviors attached for Setup Form.
 */
$(document).ready(function() {
  function show_hide_element(element_name, show_label) {
    if (show_label != '') {
      $(element_name).show();
    } else {
      $(element_name).hide();
    }
    $(element_name + '_label').text(show_label);
  }

  /* NFL and NBA use same labels */
  function nfl_nba() {
    var labels = [ 'First Quarter', 'Second Quarter', 'Third Quarter', 'Final Score', 'Reverse Winner' ];
    for (var a = 0; a < labels.length; a++) show_hide_element('.target' + a, labels[a]);
  }

  function ncaa() {
    var labels = [ 'First Half', 'Second Half', 'Final Score', '', '' ];
    for (var b = 0; b < labels.length; b++) show_hide_element('.target' + b, labels[b]);
  }

  function mlb() {
    var labels = [ 'First Inning', 'Third Inning', 'Sixth Inning', 'Final Score', '' ];
    for (var c = 0; c < labels.length; c++) show_hide_element('.target' + c, labels[c]);
  }

  function display_events(value_selected) {
    switch (value_selected) {
      case '1': // NFL
      case '4': // NBA
        nfl_nba();
        break;
      case '2': // NCAA
        ncaa();
        break;
      case '3': // MLB
        mlb();
        break;
    }
  }

  function enabled_disabled(element_name, enabled_flag) { $('input#' + element_name).prop('disabled', !enabled_flag); }
  function blank_field(element_name, flag) { if (flag == false) field_blank('#' + element_name); }

  function diamond_winner(flag) {
    for (var i = 1; i <= 4; i++) {
      $('#diamond_winner' + i + '_qty').val(flag ? 4 : 0);
      blank_field('diamond_winner' + i, flag);
      enabled_disabled('diamond_winner' + i, flag);
    }
  }

  function reverse_winner(flag) {
    for (var i = 1; i <= 4; i++) {
      blank_field('reverse_winner' + i, flag);
      enabled_disabled('reverse_winner' + i, flag);
    }
  }

  function initialize() {
    nfl_nba();
    diamond_winner(false);
    reverse_winner(false);
  }

  function get_prize() { return parseInt($('#prize_square').val()); }
  function total_prizes() { return get_prize() * 100; }
  function calc_percent(percent_value) {
    var percent = 0;
    if (percent_value > 0) percent = percent_value / 100;
    return percent;
  }

  function check_uncheck(field_name, checkbox_flag) { $(field_name).prop('checked', checkbox_flag); }
  function field_blank(field_name) { $(field_name).val(""); }
  function set_field_zeros(field_name) { $(field_name).text('$0.00'); }

  function clear_all() {
    initialize();

    check_uncheck('#diamond_winner', false);
    check_uncheck('#reverse_winner', false);

    field_blank('#final_reverse_winner');
    field_blank('#prize_square');
    field_blank('#fundraising_percentage');
    field_blank('#giveaway_percentage');
    field_blank('#grand_total');
    field_blank('#date_from');
    field_blank('#date_to');

    set_field_zeros('#total_prizes');
    set_field_zeros('#prize_giveaway');
    set_field_zeros('#prize_fundraising');

    for (var i = 1; i <= 4; i++) field_blank('#square_winner' + i);
  }

  function calc_giveaway() {
    var percent = parseInt($('#giveaway_percentage').val());
    var giveaway_prize = total_prizes() * calc_percent(percent);
    $('#prize_giveaway').text("$" + giveaway_prize + ".00");
  }

  function calc_fundraising() {
    var fund_percent = parseInt($('#fundraising_percentage').val());
    var give_percent = parseInt($('#giveaway_percentage').val());
    var fundraising_prize = total_prizes() * calc_percent(fund_percent);
    $('#prize_fundraising').text("$" + fundraising_prize + ".00");
    if ((fund_percent + give_percent) != 100) {
      alert('Giveaway and Fundraising percentages must total to 100%. Please try again.');
    }
  }

  function getValues(tag_name) { return document.getElementById(tag_name).value; }

  function calc_grand_total() {
    var diamond_winner_flag = document.getElementById("diamond_winner").checked;
    var reverse_winner_flag = document.getElementById("reverse_winner").checked;

    var total = 0;
    var diamond_total = 0;
    var reverse_total = 0;
    var grand_total = 0;

    for (var x = 1; x <= 4; x++) {
      total += Number(getValues("square_winner" + x));
      if (diamond_winner_flag == true) diamond_total += (4 * Number(getValues("diamond_winner" + x)));
      if (reverse_winner_flag == true) reverse_total += Number(getValues("reverse_winner" + x));
    }

    grand_total = total + diamond_total + reverse_total + Number(getValues("final_reverse_winner"));
    document.getElementById("grand_total").value = grand_total;
  }

  $("#select_event").change(function() { display_events($('select#select_event option:selected').val()); });

  $("input#prize_square").change(function() {
    var prize_totals = total_prizes();
    $('#total_prizes').text("$" + prize_totals + ".00");
    if ($('#giveaway_percentage').val() != 0) calc_giveaway();
    if ($('#fundraising_percentage').val() != 0) calc_fundraising();
  });

  $("input#giveaway_percentage").change(function() { calc_giveaway(); });

  $("input#fundraising_percentage").change(function() { calc_fundraising(); });

  $("#diamond_winner").change(function() { diamond_winner($('#diamond_winner').prop('checked')); });

  $("#reverse_winner").change(function() { reverse_winner($('#reverse_winner').prop('checked')); });

  $("#clearAll").click(function() { clear_all(); });

  $("#calculate").click(function() { calc_grand_total(); });

  // $("#submitForm").click(function() {
  //   let result = confirm("Are you sure you want to submit?");
  //   if (result) {
  //     e.preventDefault();
  //     $("#areaForm").submit();
  //   } else {
  //     alert('Cancel')
  //   }
  // });

  initialize();
});
