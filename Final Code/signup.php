<?php

session_start();
require 'connectingtodatabase.php';

$hidden = 0;

if (isset($_POST['submit'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['password1'];

  $stmt = $pdo->prepare("SELECT * FROM customer WHERE emailAddress = :email");
  $stmt->bindParam(":email", $email, PDO::PARAM_STR);
  $stmt->execute();
  $user = $stmt->fetch();
  $count = $stmt->rowCount();

  if ($count == 1) {
    $hidden = 1;
  } else {

    $hidden = 0;

    $sql = "INSERT INTO customer (fname, lname, emailAddress, userPassword) VALUES (:fname, :lname, :email, :pass);";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(":fname", $fname, PDO::PARAM_STR);
    $statement->bindParam(":lname", $lname, PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":pass", $pass, PDO::PARAM_STR);
    $statement->execute();

    $statement = $pdo->prepare("SELECT * FROM customer WHERE emailAddress = :email AND userPassword = :pswd");
    $statement->bindParam(':email', $email,PDO::PARAM_STR);
    $statement->bindParam(':pswd', $pass,PDO::PARAM_STR);
    $statement->execute();
    $data = $statement->fetchAll();

    $_SESSION['username'] = $data[0]['fname'];
    $_SESSION['email'] = $data[0]['emailAddress'];
    $_SESSION['lname'] = $data[0]['lname'];
    $_SESSION['id'] = $data[0]['id'];
    header('Location:index.php');

    $pdo = null;
    
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <title>Sign Up - Refadah Travel & Tourism</title>

  <link rel="stylesheet" href="loginsignuppage.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link rel="icon" type="image/x-icon" href="/images/logo.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="preloader.css">
</head>

<body onload="document.signupform.reset();">


  <div id="preloader"><img src="images/Refadah-Logo.png" class="blink_me" alt="Refadah Logo"></div>

  <div class="backtohome">
    <a href="index.php" class="xbutton"><i class="fa-solid fa-x" style="font-size: 1.3rem"></i></a>
  </div>
  <div class="wrapper">
    <div class="bigCompanyLogo">
      <img src="images/Refadah-Logo.png" width="300rem" alt="Refadah Logo" />
    </div>

    <form action="signup.php" method="post" class="loginForm" onsubmit="return validateForm()" name="signupform">
      <img src="images/Refadah-Logo.png" alt="Refadah Logo" class="topCompanyLogo" style="width: 6rem" />
      <br class="" />
      <h1 class="welcomeHead">Hello There</h1>
      <p class="subtitle">Welcome to Refadah! Please enter your details.</p>

      <div class="inputBar"></div>
      <div class="nameInputs">
        <div class="inputBar fnameInput">
          <label for="fname">First Name</label> <br />
          <input type="text" id="fname" name="fname" placeholder="John" required />
          <br />
        </div>
        <div class="inputBar lnameInput">
          <label for="lname">Last Name</label> <br />
          <input type="text" id="lname" name="lname" placeholder="Doe" required />
          <br />
        </div>
      </div>
      <div class="inputBar">
        <label for="email">Email</label> <br />
        <input type="email" id="email" name="email" onclick="clearMessage3()" placeholder="Enter your email" required />
        <br />
        <div class="messages">
          <span class="confirmationmessage" id="invalidemailmessage"></span>
        </div>
      </div>
      <div class="passwordInputs">
        <div class="inputBar passinput">
          <label for="password1">Password</label> <br />
          <input type="password" id="pswd1" name="password1" onclick="clearMessage1()" placeholder="●●●●●●●●●" required />
          <br />
          <div class="messages">
            <span class="confirmationmessage" id="message1"></span>
          </div>
        </div>
        <div class="inputBar passinput confirmPass">
          <label for="password2">Confirm Password</label> <br />
          <input type="password" id="pswd2" name="password2" onclick="clearMessage2()" placeholder="●●●●●●●●●" required />
          <br />
          <div class="messages">
            <span class="confirmationmessage" id="message2"></span>
          </div>
        </div>
      </div>
      <input type="hidden" id="emailexists" name="emailexists" value=<?php echo "$hidden"?>>
      <input type="submit" value="Sign up" class="submitButton" name="submit" />
      <div style="text-align: center; padding-top: 1rem">
        <p class="signuptext">
          Already have an account? <a class="signuplink" href="login.php">Sign in</a>
        </p>
      </div>
    </form>
  </div>
  <script src="formsJS.js"></script>
  <script type="text/javascript" src="preloader.js"></script>
  <script>
    if (document.getElementById("emailexists").value == 1) {
      document.getElementById("invalidemailmessage").innerHTML =
        "Email address already in use.";
    }else {
  document.getElementById("invalidemailmessage").innerHTML = "";}
  </script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>