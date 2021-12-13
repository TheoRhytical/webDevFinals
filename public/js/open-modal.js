// Get the modal
var modal = document.getElementById("myModal");
var Modal = document.getElementById("mymodal");
var addv = document.getElementById("add-vhire");
var delsched = document.getElementById("del-sched");
var editsched = document.getElementById("edit-sched");
var editroute = document.getElementById("edit-route");
var editbook = document.getElementById("edit-book");


$( ".myBtn" ).click(function() {
    $("#myAddModal").show();
});

$( ".Btnd" ).click(function() {
    var routeID = $(this).attr('data-route-id');
    $('#curr-route').val(routeID); 
    $("#mymodal").show();
});

$( ".vhire" ).click(function() {
  $("#add-vhire").show();
});
$( ".add_book_btn" ).click(function() {
  $("#add-booking").show();
});



$( ".update" ).click(function() {
  $("#edit-vhire").show();
});

$( ".e-sched" ).click(function() {
  $("#edit-sched").show();
});

$( ".e-route" ).click(function() {
  $("#edit-route").show();
});

$( ".e-book" ).click(function() {
  $("#edit-book").show();
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
    $("#myAddModal").hide();
    $("#mymodal").hide();
    $("#add-vhire").hide();
    $("#add-booking").hide();
    $("#edit-vhire").hide();
    $("#del-sched").hide();
    $("#edit-sched").hide();
    $("#edit-route").hide();
    $("#edit-book").hide();
    $("#del-book-modal").hide();
  });
  
  $(".exit-modal").click(function (){
  $("#myAddModal").hide();
  $("#mymodal").hide();
  $('#del-sched').hide();
  $('#del-book-modal').hide();
  $('#add-vhire').hide();
  $('#edit-vhire').hide();
  $('#edit-route').hide();
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
  if (event.target == editsched) {
    editsched.style.display = "none";
  }
  if (event.target == editroute) {
    editroute.style.display = "none";
  }
  if (event.target == editbook) {
    editbook.style.display = "none";
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



$(document).on('click','.e-sched',function(){
  var _this = $(this).parents('.sc');
  
  $('#trip').val(_this.find('.trip').text());
  $('#vnum').val(_this.find('.plate').text());
  $('#dept').val(_this.find('.etd').text());
  $('#rot').val(_this.find('.rtID').text());
  $('#statt').val(_this.find('.stat').text());
  $('#drvr').val(_this.find('.pass').text());
  $('#arrv').val(_this.find('.eta').text());
  $('#cpcty').val(_this.find('.seat').text());
})

$(document).on('click','.e-route',function(){
  var _this = $(this).parents('.row');
  
  $('#rname').val(_this.find('.rrr').text());
  $('#T1').val(_this.find('.ot').text());
  $('#T2').val(_this.find('.dt').text());
  $('#fare').val(_this.find('.fare').text());
  $('#TT').val(_this.find('.time').text());
})

$(document).on('click','.e-book',function(){
  var _this = $(this).parents('.sc');
  
  $('#date').val(_this.find('.dateT').text());
  $('#qty').val(_this.find('.pcs').text());
  $('#passID').val(_this.find('.bpass').text());
  $('#tid').val(_this.find('.tp').text());
  $('#bstat').val(_this.find('.bstat').text());
})

