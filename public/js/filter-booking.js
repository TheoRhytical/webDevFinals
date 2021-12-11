$( "#bookALL" ).click(function() {
    $("#bookALL").css({"background-color": "#4C15E9"});
    $("#bookCON").css({"background-color": "#826DFF"});
    $("#bookPEN").css({"background-color": "#826DFF"});
    $("#bookCAN").css({"background-color": "#826DFF"});
    $(".bookAll").show();
    $(".bookConfirmed").hide();
    $(".bookPending").hide();
    $(".bookCancel").hide();
  });

  $( "#bookCON" ).click(function() {
    $("#bookCON").css({"background-color": "#4C15E9"});
    $("#bookALL").css({"background-color": "#826DFF"});
    $("#bookPEN").css({"background-color": "#826DFF"});
    $("#bookCAN").css({"background-color": "#826DFF"});
    $(".bookConfirmed").show();
    $(".bookAll").hide();
    $(".bookPending").hide();
    $(".bookCancel").hide();
  });

  $( "#bookPEN" ).click(function() {
    $("#bookPEN").css({"background-color": "#4C15E9"});
    $("#bookCON").css({"background-color": "#826DFF"});
    $("#bookALL").css({"background-color": "#826DFF"});
    $("#bookCAN").css({"background-color": "#826DFF"});
    $(".bookPending").show();
    $(".bookConfirmed").hide();
    $(".bookAll").hide();
    $(".bookCancel").hide();
  });

  $( "#bookCAN" ).click(function() {
    $("#bookCAN").css({"background-color": "#4C15E9"});
    $("#bookCON").css({"background-color": "#826DFF"});
    $("#bookPEN").css({"background-color": "#826DFF"});
    $("#bookALL").css({"background-color": "#826DFF"});
    $(".bookCancel").show();
    $(".bookConfirmed").hide();
    $(".bookPending").hide();
    $(".bookAll").hide();
  });