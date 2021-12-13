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

$( ".update" ).click(function() {
  $("#edit-vhire").show();
});

$( ".del-scheds" ).click(function() {
  var adminID = $(this).attr('data-admin-id');
  $('#curr-admin').val(adminID); 
  $("#del-sched").show();
});


$( ".del-books" ).click(function() {
  var bookID = $(this).attr('data-book-id');
  console.log(bookID);
  $('#del_book').val(bookID); 
  $("#del-book-modal").show();
});





$( ".close" ).click(function() {
    $("#mymodal").hide();
    $("#myModal").hide();
    $("#add-vhire").hide();
    $("#edit-vhire").hide();
    $("#del-sched").hide();
    $("#del-book-modal").hide();
});

$(".exit-modal").click(function (){
  $('#del-sched').hide();
  $('#del-book-modal').hide();
  $('#add-vhire').hide();
  $('#edit-vhire').hide();
  $('#add-booking').hide();
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

$(document).on('click','.update',function(){
  var _this = $(this).parents('.sc');
  
  $('#a_adminID').val(_this.find('.id').text());
  $('#a_Email').val(_this.find('.email').text());
  $('#a_ContactNum').val(_this.find('.contact').text());
  $('#a_Username').val(_this.find('.username').text());
  $('#a_status').val(_this.find('.status').text());
})