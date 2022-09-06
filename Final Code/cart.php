<?php

$notsignedin = "0";
session_start();
if (isset($_SESSION['username'])) {
  $notsignedin = "1";
  $_SESSION['add'] = 0;
} else {

  $notsignedin = "0";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <title>Cart - Refadah Travel & Tourism</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link rel="icon" type="image/x-icon" href="/images/logo.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="brandstyle.css?v=4.15" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="preloader.css" />
  <link rel="stylesheet" href="packages.css" />
</head>

<body>
  <div id="preloader">
    <img src="images/Refadah-Logo.png" class="blink_me" alt="Refadah Logo" />
  </div>

  <div class="websitePage">
    <div class="containertop">
      <div class="navbartop">
        <a href="index.php"><img src="images/logo.png" alt="Refadah Logo" class="logo" /></a>
        <a href="index.php" class="logotitle">
          <h1 class="logotitle">Refadah</h1>
        </a>
        <nav class="menutop menuPhone" id="menuPhone">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="packages.php">Packages</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li class="hellotext">Hello, <?php echo $_SESSION['username'] ?></li>
                <li class="newusertext">Welcome to Refadah!</li>
                <li>
                  <a class="dropdown-item loginitem" href="login.php">Log In</a>
                </li>
                <li>
                  <a class="dropdown-item signupitem" href="signup.php">Sign Up</a>
                </li>
                <li>
                  <a class="dropdown-item profileitem" href="profile.php">Profile</a>
                </li>
                <li>
                  <a class="dropdown-item paymentitem" href="#">Payment Method</a>
                </li>
                <li><a class="dropdown-item logoutitem" href="logout.php">Log out</a></li>
              </ul>
            </li>
            <li>
              <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
            </li>
          </ul>
        </nav>
        <img src="images/burger-bar.png" alt="Burger Menu" class="burger" onclick="toggleNav()" />
      </div>
    </div>




    <!-- Mid Section -->

    <div class="content" style="height: 76vh;">
    
    <h1 style="color: #54A6B1; font-style: italic;">Coming soon..</h1>

      </div>

      <footer class="footerContent">
        <div class="midSection">
          <p class="footerText">
            Refadah Travel & Tourism. All Rights Reserved. &copy;
          </p>

          <ul class="leftMenu">
            <li><a href="index.php"> Home </a></li>
            <li><a href="packages.php"> Packages </a></li>
            <li><a href="contactUs.php"> Contact Us </a></li>
            <li><a href="#"> Cart </a></li>
          </ul>
          <div class="socialMedia">
            <i class="fa-brands fa-instagram socialIcon instaIcon"></i>
            <i class="fa-brands fa-facebook-f socialIcon facebookIcon"></i>
            <i class="fa-solid fa-envelope socialIcon mailIcon"></i>
            <i class="fa-solid fa-phone socialIcon phoneIcon"></i>
          </div>
        </div>
      </footer>
    </div>
    <input type="hidden" name="loggedin" id="loggedininput" value="<?php echo $notsignedin ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="mainPage.js"></script>
    <script type="text/javascript" src="preloader.js"></script>
</body>

</html>