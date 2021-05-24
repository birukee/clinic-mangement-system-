function myFunction() {
var name = document.getElementById("opdname").value;
var password = document.getElementById("opdpassword").value;
var btn =document.getElementsByClassName("btn btn-outline-light active");
document.getElementById("opdpassword").className = "form-control is-invalid";
document.getElementById("opdicon").className = "form-control is-invalid";
var category=btn[0].value;
alert(btn[0].value);
alert(" lab Please Fill All Fields");   
// Returns successful data submission message when the entered information is stored in database.


var dataString = 'labname1=' + namelab +  '&labpassword1=' + passwordlab + '&category1=' + category;   


if(name == '' || password == '' && category =='lab'){
alert(" lab Please Fill All Fields");    
}
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajaxjs.php",
data: dataString,
cache: false,
 success:function(html){
$('#msg_error').html(html);}
});
}
return false;
}