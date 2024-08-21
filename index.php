<?php
session_start();
if (isset($_SESSION["email"])) {
  $cookie_name = "email";
  session_start();
  $email = $_SESSION["email"];
  $cookie_value = $email;
  if ($email == "admin@roots.info") {
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    header("Location: adminPannel.php");
  } else {
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    header("Location: indexAfter.php");
  }
} else {
  $count = 0;
  $query3 = "SELECT * FROM `cartnotlogin`";
  $connect = mysqli_connect("localhost", "root", "", "roots");
  $result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
  if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
      $count++;
    }
  }

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      body {
        margin: 0;
        font-family:sans-serif;

      }

      .split {
        display: flex;
        min-height: 100vh;
        overflow-x: hidden;
      }

      .left,
      .right {
        flex: 1;
      }

      .centered {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
      }

      .centered img {
        max-width: 100%;
        height: auto;
      }

      /* Media query for screens smaller than 600px (typical mobile devices) */
      @media only screen and (max-width: 600px) {
        .split {
          min-height: 150vh;
          top: 800px;
        }

        .centered {
          padding: 40px;
          top: 420px;
          min-height: 100vh;
          font-size: 10px;
        }

        .centered img {
          max-width: 300px;
          max-height: 300px;
        }

        img {
          max-width: 100px;
          max-height: 100px;
        }

        table {
          border-collapse: collapse;
          margin: auto;
        }

        th,
        td {
          padding: 25px;
          text-align: center;

        }

      }
    </style>
  </head>

  <body>
    <div id="cat">
      <ul>
        <li id="Home" class="active filter"><a href="index.php">Home</a></li>
        <div class="class1 filter dropdown">
          <li><button class="class1 dropbtn">
              Products
            </button></li>
          <div class="dropdown-content" style="top:100px;">
            <a href="indoor.php">Indoor Plants</a>
            <a href="outdoor.php">Outdoor Plants</a>
            <a href="Tools.php">Tools & Equipments</a>
          </div>
        </div>
        <div class="class1 filter dropdown">
          <li id="Services" class=" filter"><a href="Services.php">Services</a></li>
        </div>
        <div class="class1 filter dropdown">
          <li id="Advice" class=" filter"><a href="Advices.php">Advice & FAQs</a></li>
        </div>
        <div style="top:-30px;  left:120px; height:40px; width:50px; " class="class1 filter dropdown">
          <a href="CartWithoutLogin.php"><button class=" button1" style="border:0px; background-color: #2a453c; height:100px; "><img src="img/cart.png" style="max-width:80px; max-height:50px;"></button></a>
        </div>
        <div style="top:-25px;  left:100px; height:30px; width:50px; " class="class1 filter dropdown">
          <a href="CartWithoutLogin.php" style="color:white;"><?php echo $count; ?></a>
        </div>

      </ul>
      <div align="right">
        <a href="Login.html"><button class="button button4">Login</button></a>
        <a href="Register.html"><button class="button button4">Registration</button></a>
      </div>

    </div>
    <br><br>
    <div class="split left" style="top:350px;">
      <div class="centered" style="overflow-x:auto; text-align:center;">
        <br><br><br><br><br><br><br><br><br>
        <a href="index.php"><img src="logo.png" align="center" style="height:200px; width:200px"></a>
        <h1>"About us : Based on the 2030 vision of the green initiative, we create our website 'ROOTS',
          For customers who want to increase the green space in their home,and the workplace,
          but there are some who do not have the information and time .our website also provides the services
          by specialized planter who has experience in plantation to give the customer advices on how to preservation plants".</h1>
        <br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    <div class="split right">
      <div class="centered">
        <div class="slideshow-container">

          <div class="mySlides fade">
            <div class="numbertext">1 / 8</div>
            <img src="img/1.jpg" style="height:600px; width:600px">
            <div class="text">Outdoor plant (Lavender)<br>55 SAR</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 8</div>
            <img src="img/2.jpg" style="height:600px; width:600px">
            <div class="text">Outdoor plant (Plam tree)<br> 240 SAR</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 8</div>
            <img src="img/3.jpg" style="height:600px; width:600px">
            <div class="text">Outdoor plant (Verbena flower)<br>100 SAR</div>
          </div>
          <div class="mySlides fade">
            <div class="numbertext">4 / 8</div>
            <img src="img/4.jpg" style="height:600px; width:600px">
            <div class="text">A set of plant pots consisting of 4 pcs in matching colors, Suitable for small indoor plants<br>90 SAR</div>
          </div>
          <div class="mySlides fade">
            <div class="numbertext">5 / 8</div>
            <img src="img/5.jpg" style="height:600px; width:600px">
            <div class="text">Modern design manual plant sprayer<br>45 SAR</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">6 / 8</div>
            <img src="img/6.jpg" style="height:600px; width:600px">
            <div class="text">Indoor plant (pink Aglaonema)<br>50 SAR</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">7 / 8</div>
            <img src="img/7.jpg" style="height:600px; width:600px">
            <div class="text">soil moisture meter for garden<br>65 SAR</div>
          </div>
          <div class="mySlides fade">
            <div class="numbertext">8 / 8</div>
            <img src="img/8.jpg" style="height:600px; width:600px">
            <div class="text">Indoor plant (Bonsai)<br>87 SAR</div>
          </div>
          <a class="prev" onclick="plusSlides(-1);">
            <</a>
              <a class="next" onclick="plusSlides(1);">></a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span>
          <span class="dot" onclick="currentSlide(6)"></span>
          <span class="dot" onclick="currentSlide(7)"></span>
          <span class="dot" onclick="currentSlide(8)"></span>
        </div>

      </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div>
      <br><br><br><br><br><br>
      <center>
        <div style="overflow-x:auto; top:100px;">
          <table border="0">
            <tr>
              <td><a href="Tools.php" style="color:#3e8e41;"><img src="img/icons/tools.jpg" style="height:200px; width:200px; border-radius: 50%;"><br><br>Tools & Equipments</a></td>
              <td><a href="outdoor.php" style="color:#3e8e41;"><img src="img/icons/outdoor.jpg" style="height:200px; width:200px; border-radius: 50%;"><br><br>Outdoor Plants</a></td>
              <td><a href="Indoor.php" style="color:#3e8e41;"><img src="img/icons/indoor.jpg" style="height:200px; width:200px; border-radius: 50%;"><br><br>Indoor Plants</a></td>
              <td><a href="Services.php" style="color:#3e8e41;"><img src="img/icons/services.jpg" style="height:200px; width:200px; border-radius: 50%;"><br><br>Services</a></td>
              <td><a href="Advices.php" style="color:#3e8e41;"><img src="img/icons/advices.jpg" style="height:200px; width:200px; border-radius: 50%;"><br><br>Advices</a></td>
            </tr>
          </table>
      </center>
    </div>
    <footer>
      <img src="logo.png" width="250px" alt="Roots Logo">
      <p>Copyright 2023-2024. All rights reserved by Roots Project</p>
      <div class="social-links">
        <a href="https://instagram.com/roots_pl?igshid=YzAwZjE1ZTI0Zg%3D%3D&utm_source=qr"><img src="./img/instgram.png" alt="" height="50px" /></a>&nbsp &nbsp &nbsp
        <a href="mailto:Roots.pl00@gmail.com"><img src="./img/mail.png" alt="" height="70px" /></a>
        <a href="https://wa.me/+966545010018"><img src="img/whatsapp.png" alt="" height="80px" /></a>
      </div>
    </footer>
    <script>
      let slideIndex = 0;
      showSlides();
      let slideIndex2 = 1;
      showSlides2(slideIndex2);


      function plusSlides(n) {
        showSlides2(slideIndex += n);
      }
      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
      }
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
          var myDropdown = document.getElementById("myDropdown");
          if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
          }
        }
      }

      function showSlides2(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
          slideIndex = 1
        }
        if (n < 1) {
          slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
  </body>

  </html>
<?php
}
?>