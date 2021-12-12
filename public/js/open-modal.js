// Get the modal
var modal = document.getElementById("myModal");
var Modal = document.getElementById("mymodal");
var addv = document.getElementById("add-vhire");
var delsched = document.getElementById("del-sched");
var editsched = document.getElementById("edit-sched");

$( ".myBtn" ).click(function() {
    $("#myModal").show();
});

$( ".Btnd" ).click(function() {
    $("#mymodal").show();
});

$( ".vhire" ).click(function() {
  $("#add-vhire").show();
});

$( ".update" ).click(function() {
  $("#edit-vhire").show();
});

$( ".del-scheds" ).click(function() {
  var adminID = $(this).attr('data-admin-id');
  $('#curr-admin').val(adminID); 
  $("#del-sched").show();
});

$( ".e-vhire" ).click(function() {
  $("#edit-sched").show();
});

$( ".close" ).click(function() {
    $("#mymodal").hide();
    $("#myModal").hide();
    $("#add-vhire").hide();
    $("#edit-vhire").hide();
    $("#del-sched").hide();
    $("#edit-sched").hide();
});

$(".exit-modal").click(function (){
  $('#del-sched').hide();
  $('#add-vhire').hide();
  $('#edit-vhire').hide();
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
  if (event.target == editsched) {
    editsched.style.display = "none";
  }
}

$(document).on('click','.update',function(){
  var _this = $(this).parents('.sc');
  
  $('#a_adminID').val(_this.find('.id').text());
  $('#a_Email').val(_this.find('.email').text());
  $('#a_ContactNum').val(_this.find('.contact').text());
  $('#a_Username').val(_this.find('.username').text());
  $('#a_status').val(_this.find('.status').text());
})

$(document).on('click','.e-vhire',function(){
  var _this = $(this).parents('.sc');
  
  $('#vnum').val(_this.find('.plate').text());
  $('#dept').val(_this.find('.etd').text());
  $('#rot').val(_this.find('.rtid').text());
  $('#statt').val(_this.find('.stat').text());
  $('#drvr').val(_this.find('.driver').text());
  $('#arriv').val(_this.find('.eta').text());
  $('#cpcty').val(_this.find('.seat').text());
})