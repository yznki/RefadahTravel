function validateForm() {
  var pw1 = document.getElementById("pswd1").value;
  var pw2 = document.getElementById("pswd2").value;

  if (pw1 == "") {
    document.getElementById("message1").innerHTML = "Fill the password please!";
    return false;
  } else {
    document.getElementById("message1").innerHTML = "";
  }

  //check empty confirm password field
  if (pw2 == "") {
    document.getElementById("message2").innerHTML =
      "Enter the password please!";
    return false;
  } else {
    document.getElementById("message1").innerHTML = "";
  }

  //minimum password length validation
  if (pw1.length < 8) {
    document.getElementById("message1").innerHTML =
      "Password length must be at least 8 characters";
    return false;
  } else {
    document.getElementById("message1").innerHTML = "";
  }

  //maximum length of password validation
  if (pw1.length > 20) {
    document.getElementById("message1").innerHTML =
      "Password length must not exceed 20 characters";
    return false;
  } else {
    document.getElementById("message1").innerHTML = "";
  }

  if (pw1 != pw2) {
    document.getElementById("message2").innerHTML = "Passwords are not same";
    return false;
  } else {
  }
}

function clearMessage1() {
  document.getElementById("message1").innerHTML = "";
}
function clearMessage2() {
  document.getElementById("message2").innerHTML = "";
}

function clearMessage3() {
  document.getElementById("emailMessage").innerHTML = "";
}
