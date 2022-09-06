<?php

session_start();
require 'connectingtodatabase.php';

if (!isset($_SESSION['username'])) {
  header('Location:index.php');
}
$hidden = 0;
if (isset($_POST['submitedit'])) {
  echo $hidden;
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];

  $stmt = $pdo->prepare("SELECT * FROM customer WHERE emailAddress = :email");
  $stmt->bindParam(":email", $email, PDO::PARAM_STR);
  $stmt->execute();
  $user = $stmt->fetchAll();
  $count = $stmt->rowCount();

  if ($count == 1 AND $user[0]['emailAddress'] != $email ) {
    $hidden = 1;
  } else {
    $hidden = 0;
    $stmt = $pdo->prepare("UPDATE customer SET fname = :fname, lname = :lname, emailAddress = :email WHERE emailAddress = :oldemail");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
    $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
    $stmt->bindParam(":oldemail", $_SESSION['email'], PDO::PARAM_STR);
    $stmt->execute();

    $_SESSION['username'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    header('Location:profile.php');

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
  <title>Edit Profile - Refadah Travel & Tourism</title>

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
    <a href="profile.php" class="xbutton"><i class="fa-solid fa-x" style="font-size: 1.3rem"></i></a>
  </div>
  <div class="wrapper">
    <div class="bigCompanyLogo">
      <img src="images/Refadah-Logo.png" width="300rem" alt="Refadah Logo" />
    </div>

    <form method="post" class="loginForm" name="editform">
      <img src="images/Refadah-Logo.png" alt="Refadah Logo" class="topCompanyLogo" style="width: 6rem" />
      <br class="" />
      <h1 class="welcomeHead">Edit Profile</h1>
      <p class="subtitle">Please enter your edits.</p>

      <div class="inputBar"></div>
      <div class="nameInputs">
        <div class="inputBar fnameInput">
          <label for="fname">First Name</label> <br />
          <input type="text" id="fname" name="fname" placeholder="John" value=<?php echo $_SESSION['username'] ?> required />
          <br />
        </div>
        <div class="inputBar lnameInput">
          <label for="lname">Last Name</label> <br />
          <input type="text" id="lname" name="lname" placeholder="Doe" value=<?php echo $_SESSION['lname'] ?> required />
          <br />
        </div>
      </div>
      <div class="inputBar">
        <label for="email">Email</label> <br />
        <input type="email" id="email" name="email" placeholder="Enter your email" value=<?php echo $_SESSION['email'] ?> required />
        <br />
        <div class="messages">
          <span class="confirmationmessage" id="invalidemailmessage"></span>
        </div>
      </div>
      <input type="hidden" id="emailexists" name="emailexists" value=<?php echo "$hidden"?>>
      <input type="submit" value="Save" class="submitButton" name="submitedit" />
    </form>
  </div>
  <script type="text/javascript" src="preloader.js"></script>
  <script>
    if (document.getElementById("emailexists").value == 1) {
      document.getElementById("invalidemailmessage").innerHTML =
        "Email address already in use.";
    }else {
  document.getElementById("invalidemailmessage").innerHTML = "";}
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>