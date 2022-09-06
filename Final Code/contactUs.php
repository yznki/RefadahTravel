<?php

$notsignedin = "0";
session_start();
if (isset($_SESSION['username'])) {
  $notsignedin = "1";
} else {

  $notsignedin = "0";
}

require "connectingtodatabase.php";

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $reason = $_POST['reason'];

  $sql = "INSERT INTO contactus (name, email, reason) VALUES (:name, :email, :reason)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':reason', $reason, PDO::PARAM_LOB);
  $stmt->execute();

  $pdo = null;
  header('Location:thankyou.html');


}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <title>Contact Us - Refadah Travel & Tourism</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="/images/logo.png" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="brandstyle.css?v=4.15" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="contactus.css" />
    <link rel="stylesheet" href="preloader.css" />
  </head>
  <body>
    <div id="preloader">
      <img src="images/Refadah-Logo.png" class="blink_me" alt="Refadah Logo" />
    </div>

    <div class="websitePage">
      <div class="containertop">
        <div class="navbartop">
          <a href="index.php"
            ><img src="images/logo.png" alt="Refadah Logo" class="logo"
          /></a>
          <a href="index.php"><h1 class="logotitle">Refadah</h1></a>
          <nav class="menutop menuPhone" id="menuPhone">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="packages.php">Packages</a></li>
              <li><a href="contactUs.php">Contact Us</a></li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDarkDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Account
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-dark"
                  aria-labelledby="navbarDarkDropdownMenuLink"
                >
                  <li class="hellotext">Hello, <?php echo $_SESSION['username'] ?></li>
                  <li class="newusertext">Welcome to Refadah!</li>
                  <li>
                    <a class="dropdown-item loginitem" href="login.php"
                      >Log In</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item signupitem" href="signup.php"
                      >Sign Up</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item profileitem" href="profile.php">Profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item paymentitem" href="#"
                      >Payment Method</a
                    >
                  </li>
                  <li><a class="dropdown-item logoutitem" href="logout.php">Log out</a></li>
                </ul>
              </li>
              <li>
                <a href="cart.php"><i class="fa-solid fa-cart-shopping cart"></i></a>
              </li>
            </ul>
          </nav>
          <img
            src="images/burger-bar.png"
            alt="Burger Menu"
            class="burger"
            onclick="toggleNav()"
          />
        </div>
      </div>

      <div class="headingwrapper"><h1 class="heading">Contact Us</h1></div>

      <form class="contactForm" method="post">
        <div class="toprow">
          <div class="inputBar nameInput">
            <label for="name" class="inputlabel">Name</label> <br />
            <input
              type="text"
              name="name"
              placeholder="Enter your name"
              required
            />
          </div>
          <div class="inputBar emailInput">
            <label for="email" class="inputlabel">Email</label> <br />
            <input
              type="email"
              name="email"
              placeholder="Enter your email"
              required
            />
            <br />
          </div>
        </div>
        <div class="inputBar reasonInput">
          <label for="reason" class="inputlabel">Reason</label> <br />
          <textarea
            class="textareareason"
            name="reason"
            rows="3"
            cols="30"
            placeholder="Reason for contact."
            required
          ></textarea>
        </div>

        <button type="submit" name="submit" class="submitButton">Submit</button>
      </form>

      <div class="loco">
        <div class="mapimg topmap">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.3421025515077!2d35.89261971514938!3d31.978740381220423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca015e8f7e553%3A0x8e3140413de06dfc!2zUmVmYWRhaCBUcmF2ZWwgJiBUb3VyaXNtIHwg2LHZgdin2K_YqSDZhNmE2LPZitin2K3YqSDZiNin2YTYs9mB2LE!5e0!3m2!1sen!2sjo!4v1660074945461!5m2!1sen!2sjo"
            class="mapimg"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            width="90%"
          ></iframe>
        </div>

        <div class="wraploco">
          <div class="branchdetails">
            <p class="maphead">Our Branch</p>
            <p class="locationmap">
              Complex No 99, Al Shareef Abd Al Hameed Sharaf St 99.
            </p>
            <p class="cityncountry">Amman, Jordan</p>
            <br />
          </div>


          <div class="mapimg midmap">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.3421025515077!2d35.89261971514938!3d31.978740381220423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca015e8f7e553%3A0x8e3140413de06dfc!2zUmVmYWRhaCBUcmF2ZWwgJiBUb3VyaXNtIHwg2LHZgdin2K_YqSDZhNmE2LPZitin2K3YqSDZiNin2YTYs9mB2LE!5e0!3m2!1sen!2sjo!4v1660074945461!5m2!1sen!2sjo"
              class="mapimg"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              width="90%"
              class="googleimg"
            ></iframe>
          </div>


          <div class="socials">
            <h3 class="socialshead">Contact Methods</h3>

            <div class="wrapper">
              <a href="tel:+96265656100"
                ><i class="fa-solid fa-phone icon"></i>
                <p class="phonenumber icontext">+962 6 565 6100</p></a
              >
            </div>
            <div class="wrapper">
              <a href="mailto:info@refadah.com"
                ><i class="fa-solid fa-envelope icon"></i>
                <p class="email icontext">info@refadah.com</p></a
              >
            </div>
            <div class="wrapper">
              <a href="http://facebook.com/refadahjo"
                ><i class="fa-brands fa-square-facebook icon"></i>
                <p class="facebook icontext">/ Refadahjo</p></a
              >
            </div>
            <div class="wrapper">
              <a href="http://instagram.com/refadahjo"
                ><i class="fa-brands fa-instagram icon"></i>
                <p class="instagram icontext">@ RefadahJO</p></a
              >
            </div>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="mainPage.js"></script>
    <script type="text/javascript" src="preloader.js"></script>
  </body>
</html>