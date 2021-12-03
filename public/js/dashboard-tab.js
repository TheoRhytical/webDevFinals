$( "#vd" ).click(function() {
    $("#vd").css({"background-color": "white", "color": "#250B71"});
    $("#rb").css({"background-color": "#826DFF", "color": "white"});
    $("#departures").show();
    $("#bookings").hide();
});

$( "#rb" ).click(function() {
    $("#rb").css({"background-color": "white", "color": "#250B71"});
    $("#vd").css({"background-color": "#826DFF", "color": "white"});
    $("#departures").hide();
    $("#bookings").show();
});

$( "#pd" ).click(function() {
    $("#pd").css({"background-color": "#0F0645", "color": "white"});
    $("#bd").css({"background-color": "#4C15E9", "color": "white"});
    $("#modal-passenger").show();
    $("#modal-book").hide();
});

$( "#bd" ).click(function() {
    $("#bd").css({"background-color": "#0F0645", "color": "white"});
    $("#pd").css({"background-color": "#4C15E9", "color": "white"});
    $("#modal-book").show();
    $("#modal-passenger").hide();
});