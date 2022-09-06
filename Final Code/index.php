<?php

$notsignedin = "0";
session_start();
if (isset($_SESSION['username'])) {
  $notsignedin = "1";
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
  <meta http-equiv="cache-control" content="no-cache">
  <meta name="keywords" content="travel, tourism, travel&tourism,travel and tourism">
  <title>Refadah Travel & Tourism</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="/images/logo.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="brandstyle.css?v=4.15" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="preloader.css">
</head>

<body>

  <div id="preloader"><img src="images/Refadah-Logo.png" class="blink_me" alt="Refadah Logo"></div>

  <div class="websitePage">
    <div class="containertop indextop">
      <div class="navbartop">
        <a href="index.php"><img src="images/logo.png" alt="Refadah Logo" class="logo" /></a>
        <a href="index.php">
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
              <ul class="dropdown-menu dropdown-menu-dark indexdropdown" aria-labelledby="navbarDarkDropdownMenuLink">
                <li class="hellotext"> Hello, <?php echo $_SESSION['username'] ?></li>
                <li class="newusertext"> Welcome to Refadah!</li>
                <li><a class="dropdown-item loginitem" href="login.php">Log In</a></li>
                <li><a class="dropdown-item signupitem" href="signup.php">Sign Up</a></li>
                <li><a class="dropdown-item profileitem" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item paymentitem" href="#">Payment Method</a></li>
                <li><a class="dropdown-item logoutitem" href="logout.php">Log out</a></li>
              </ul>
            </li>
            <li>
              <a href="cart.php"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </li>
          </ul>
        </nav>
        <img src="images/burger-bar.png" alt="Burger Menu" class="burger" onclick="toggleNav()" />
      </div>
    </div>

    <!-- Middle Section -->

    <div class="page-content">
      <div class="homeHeader">
        <img src="images/header.jpg" alt="Webpage Header Image" class="headerImage" />
      </div>

      <h1 class="topsellingtext">Top Selling</h1>

      <div class="topSelling">
        <div class="package1 package">
          <div class="packageimg">
            <img src="images/london.jpeg" alt="London City" class="packageimg" style="object-fit: cover" />
          </div>
          <div class="packagetext">
            <div class="priceandbutton">
              <p class="city">London - 5 Days</p>
              <p class="price">850 JOD</p>
            </div>
            <a href="packages.php"><button type="button" class="addCartButton">&plus;</button></a>
          </div>
        </div>
        <div class="package2 package">
          <div class="packageimg">
            <img src="images/newyork.jpeg" alt="New York City" class="packageimg" style="object-fit: cover" />
          </div>
          <div class="packagetext">
            <div class="priceandbutton">
              <p class="city">New York - 4 Days</p>
              <p class="price">650 JOD</p>
            </div>
            <a href="packages.php"><button type="button" class="addCartButton">&plus;</button></a>
          </div>
        </div>
        <div class="package3 package">
          <div class="packageimg">
            <img src="images/turkey.jpeg" alt="Istanbul City" class="packageimg" style="object-fit: cover" />
          </div>
          <div class="packagetext">
            <div class="priceandbutton">
              <p class="city">Istanbul - 7 Days</p>
              <p class="price">500 JOD</p>
            </div>
            <a href="packages.php"><button type="button" class="addCartButton">&plus;</button></a>
          </div>
        </div>
        <div class="package4 package">
          <div class="packageimg">
            <img src="images/maldives.jpeg" alt="Maldives City" class="packageimg" style="object-fit: cover" />
          </div>
          <div class="packagetext">
            <div class="priceandbutton">
              <p class="city">Maldives - 3 Days</p>
              <p class="price">750 JOD</p>
            </div>
            <a href="packages.php"><button type="button" class="addCartButton">&plus;</button></a>
          </div>
        </div>
      </div>

      <div class="midimg">
        <img src="images/midimg.jpg" alt="Banner Image" class="midimg">
      </div>

      <div class="ourbranch">

        <div class="mapimg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.3421025515077!2d35.89261971514938!3d31.978740381220423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca015e8f7e553%3A0x8e3140413de06dfc!2zUmVmYWRhaCBUcmF2ZWwgJiBUb3VyaXNtIHwg2LHZgdin2K_YqSDZhNmE2LPZitin2K3YqSDZiNin2YTYs9mB2LE!5e0!3m2!1sen!2sjo!4v1660074945461!5m2!1sen!2sjo" class="mapimg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="branchdetails">

          <p class="maphead">Our Branch</p>
          <p class="locationmap">Complex No 99, Al Shareef Abd Al Hameed Sharaf St 99.</p>
          <p class="cityncountry"> Amman, Jordan</p>
          <br>
          <p class="visittimes"> You are welcome to visit us for any inquiries during the weekdays from <span class="time">09:00 </span>until <span class="time">16:00</span>.</p>
          <br>
          <p class="getincontact"> You can also get in contact with us through our social media or the contact form.</p>
          <br>
          <a href="contactus.php" class="contactbtn"><button type="button" class="contactbtn">Contact Us</button></a>

        </div>

      </div>
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
          <li><a href="cart.php"> Cart </a></li>
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