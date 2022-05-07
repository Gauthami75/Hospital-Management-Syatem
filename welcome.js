
var selection = document.getElementById("inputState");

selection.onchange = function(event){
var rc = event.target.options[event.target.selectedIndex].dataset.value;
var clnc = event.target.options[event.target.selectedIndex].dataset.time;
var firstday = event.target.options[event.target.selectedIndex].dataset.day1;
var secday = event.target.options[event.target.selectedIndex].dataset.day2;
var thirday = event.target.options[event.target.selectedIndex].dataset.day3;
     document.getElementById("fee").value = rc;
     document.getElementById("appontment-time").value = clnc;
     document.getElementById("d1").innerHTML = firstday;
     document.getElementById("d2").innerHTML = secday;
     document.getElementById("d3").innerHTML = thirday;
};

//var txt="hi";
function cancelAppointment(e){
   var txt;
    if(confirm("This Appointment will be deleted")){
        txt ="Canceled by you";
        
    }else{
        txt="";
    }
    document.getElementById("appointmentStatus").innerHTML=txt;
}


