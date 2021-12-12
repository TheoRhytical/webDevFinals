var qty = document.getElementById('qty');
var total = document.getElementById('totalPlace');
var tot = document.getElementById('tot');
var fare = document.getElementById('Fare');

qty.addEventListener('input', function(){
    var currQ = qty.value;

    tot.value = currQ;
    total.placeholder = "PHP "+(currQ * fare.value)+".00";
});

console.log(qty);