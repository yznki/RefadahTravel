function toggleNav() {

    var nav = document.querySelector("#menuPhone");
    nav.style.maxheight = "0px";

    
    if (nav.style.maxHeight == "0px") {
        nav.style.maxHeight = "25rem";
        nav.style.display = "flex";
        nav.style.top = "80px";
        nav.style.padding = '1em 0em 0 0';
    }
    else {
        nav.style.maxHeight = "0px";
        nav.style.top = "80px";
        nav.style.padding = '0';
    }

}

function loggedin() {

    if (document.getElementById("loggedininput").value == "0") {
        document.querySelector(".hellotext").style.display = "none";
        document.querySelector(".newusertext").style.display = "block";
        document.querySelector(".profileitem").style.display = "none";
        document.querySelector(".paymentitem").style.display = "none";
        document.querySelector(".loginitem").style.display = "block";
        document.querySelector(".signupitem").style.display = "block";
        document.querySelector(".logoutitem").style.display = "none";
      } else {
        document.querySelector(".hellotext").style.display = "block";
        document.querySelector(".newusertext").style.display = "none";
        document.querySelector(".profileitem").style.display = "block";
        document.querySelector(".paymentitem").style.display = "block";
        document.querySelector(".loginitem").style.display = "none";
        document.querySelector(".signupitem").style.display = "none";
        document.querySelector(".logoutitem").style.display = "block";
      }

}

document.addEventListener("DOMContentLoaded", function() {
    loggedin();
  });