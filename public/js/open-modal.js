// Get the modal
var modal = document.getElementById("myModal");
var Modal = document.getElementById("mymodal");
var addv = document.getElementById("add-vhire");
var delsched = document.getElementById("del-sched");

$( ".myBtn" ).click(function() {
    $("#myModal").show();
});

$( ".Btnd" ).click(function() {
    $("#mymodal").show();
});

$( ".vhire" ).click(function() {
  $("#add-vhire").show();
});

$( ".del-scheds" ).click(function() {
  $("#del-sched").show();
});

$( ".close" ).click(function() {
    $("#mymodal").hide();
    $("#myModal").hide();
    $("#add-vhire").hide();
    $("#del-sched").hide();
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == Modal) {
    Modal.style.display = "none";
  }
  if (event.target == addv) {
    addv.style.display = "none";
  }
  if (event.target == delsched) {
    delsched.style.display = "none";
  }
}