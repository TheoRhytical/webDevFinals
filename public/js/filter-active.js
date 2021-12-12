$( "#showALL" ).click(function() {
  $("#showALL").css({"background-color": "#4C15E9"});
  $("#showACT").css({"background-color": "#826DFF"});
  $("#showIN").css({"background-color": "#826DFF"});
  $(".disp_all").show();
  $(".disp_act").hide();
  $(".disp_in").hide();
});

$( "#showACT" ).click(function() {
  $("#showACT").css({"background-color": "#4C15E9"});
  $("#showALL").css({"background-color": "#826DFF"});
  $("#showIN").css({"background-color": "#826DFF"});
  $(".disp_act").show();
  $(".disp_all").hide();
  $(".disp_in").hide();
});

$( "#showIN" ).click(function() {
  $("#showIN").css({"background-color": "#4C15E9"});
  $("#showACT").css({"background-color": "#826DFF"});
  $("#showALL").css({"background-color": "#826DFF"});
  $(".disp_in").show();
  $(".disp_all").hide();
  $(".disp_act").hide();
});