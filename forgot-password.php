<?php
include "lib/Session.php";
Session::init();

include 'lib/Database.php';
include 'classes/User.php';

$db = new Database();
$user = new User();

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <title>NFTMUSK - Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>

    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password-reset-token']) && $_POST['email']){

            $resettoken = $user->passwordResetToken($_POST);
        }

    ?>

    <section class="loginpage text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <div class="login-user">
              <img src="img/logo.png" class="img-fluid" alt="">
              <?php  

                if (isset($resettoken)) {
                  echo $resettoken;
                }

              ?>
              <h3>Enter Email Address</h3>
              
              <form class="form" action="" method="post">
                <input type="text" class="form-control" name="email" placeholder="Email">
                <button type="submit" class="form-control" name="password-reset-token">Send Request</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
