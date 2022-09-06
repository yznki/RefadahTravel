<?php

session_start();
require "connectingtodatabase.php";

$invalid = "0";

if (isset($_POST['login'])) {

  $sql = "SELECT id, emailAddress, fname, lname FROM customer WHERE emailAddress=:emailAddress AND userPassword=:userPassword";
  $statement = $pdo->prepare($sql);
  $emailAddress = $_POST['email'];
  $userPassword = $_POST['password'];

  $statement->bindParam(":emailAddress", $emailAddress, PDO::PARAM_STR);
  $statement->bindParam(":userPassword", $userPassword, PDO::PARAM_STR);
  $statement->execute();
  $count = $statement->rowCount();
  $data = $statement->fetchAll();

  if ($count) {

    $_SESSION['username'] = $data[0]['fname'];
    $_SESSION['email'] = $data[0]['emailAddress'];
    $_SESSION['lname'] = $data[0]['lname'];
    $_SESSION['id'] = $data[0]['id'];
    header('Location:index.php');
  } else {
    $invalid = "1";
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
  <title>Log In - Refadah Travel & Tourism</title>

  <link rel="icon" type="image/png" href="logo.png" />
  <link rel="stylesheet" href="loginsignuppage.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="preloader.css">
</head>

<body onload="document.loginform.reset()" ;>

  <div id="preloader"><img src="images/Refadah-Logo.png" class="blink_me" alt="Refadah Logo"></div>

  <div class="backtohome">
    <a href="index.php" class="xbutton"><i class="fa-solid fa-x" style="font-size: 1.3rem;"></i></a>
  </div>
  <div class="wrapper">

    <form action="login.php" method="post" name="loginform" class="loginForm">

      <img src="images/Refadah-Logo.png" alt="Refadah Logo" class="topCompanyLogo" style="width: 6rem;" />
      <br />
      <h1 class="welcomeHead">Welcome Back</h1>
      <p class="subtitle">Please enter your details.</p>

      <div class="inputBar">
        <label for="email">Email</label> <br />
        <input type="email" name="email" placeholder="Enter your email" required />
        <br />
        <div class="messages">
          <span class="confirmationmessage" id="emailCheck"></span>
        </div>
      </div>
      <div class="inputBar passinput">
        <label for="password">Password</label> <br />
        <input type="password" name="password" placeholder="●●●●●●●●●" required />
        <div style="text-align: right">
          <a href="" class="forgotPass">Forgot password?</a>
        </div>
      </div>
      <input type="hidden" name="emailexists" id="checkEmail" value="<?php echo $invalid ?>">

      <input type="submit" value="Sign in" name="login" class="submitButton" />

      <div style="text-align: center; padding-top: 1rem">
        <p class="signuptext">
          Don't have an account? <a class="signuplink" href="signup.php">Sign up</a>
        </p>
      </div>
    </form>

    <div class="bigCompanyLogo">
      <img src="images/Refadah-Logo.png" width="300rem" alt="Refadah Logo" />
    </div>
  </div>
  <script type="text/javascript" src="preloader.js"></script>
  <script>
    if (document.getElementById('checkEmail').value == "1") {

      document.getElementById('emailCheck').innerHTML = "Invalid Email Address or Password";

    } else {

      document.getElementById('emailCheck').innerHTML = "";

    }
  </script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>