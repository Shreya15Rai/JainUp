<?php
session_start();
 include('db_connect.php');

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 10:52:19 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Codescandy">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-M8S4MT3EYG');
  </script>


  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/logo/newlogo.png">


  <!-- Libs CSS -->
  <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/css/theme.min.css">
  <title>Sign In | Jain Temple Moodbidri</title>
</head>

<body>
  <!-- container -->
  <main class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault"></label>

        </a>
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4 text-center">
              <img src="assets/images/brand/logo/newlogo.png" class="mb-2 text-inverse w-30 " alt="Image">
              <p class="mb-6 fs-4">Please enter your user information.</p>
            </div>
            <!-- Form -->
            <form action="sign-in.php" method="post">
              <!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">Username or email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here"
                  required="">
              </div>
              <!-- Password -->
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                  required="">
              </div>

              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button  class="btn btn-primary" name="loginbtn">Sign
                    in</button>
                </div>
              </div>

            </form>
            <?php                      
                if (isset($_POST['loginbtn'])){
                    $Email = $_POST['email'];
                    $Password = $_POST['password'];
                
                $select = mysqli_query($conn," SELECT * FROM tbl_users WHERE Email = '$Email' AND password = '$Password' ");
                $row  = mysqli_fetch_array($select);
                // echo $row;
                $name = $row['email'];
                if(is_array($row)) {
                    $_SESSION["Email"] = $row['Email'];
                    $_SESSION["Password"] = $row['password'];
                }   else {
                    echo '<script type = "text/javascript">';
                    echo 'alert("Invalid Username or Password !");';
                    echo 'window.location.href = "sign-in.php"';
                    echo '</script>';
                }
                }
                if(isset($_SESSION["Email"]) && ($_SESSION["Password"])){
                    echo '<script type = "text/javascript">';
                    // echo 'alert("Welcome To Niraamaya Admin Panel ");';
                    echo 'window.location.href = "index.php"';
                    echo '</script>';
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>




  <!-- Theme JS -->
  <script src="assets/js/theme.min.js"></script>
</body>


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 10:52:19 GMT -->

</html>