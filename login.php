<?php
include "lib/Session.php";
Session::init();

include 'lib/Database.php';
include 'classes/User.php';

$db = new Database();
$user = new User();

// if (isset($_GET['user_token'])) {
//   $user_token = $_GET['user_token'];
//   $usertoken = $user->verifyUser($user_token);

// }

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <title>NFTMUSK - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>

    <?php

        $login = Session::get("UserLogin");
        if($login == true){
            header("Location: /dashboard/home");
        }

    ?>

    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

            $customerlogin = $user->userLogin($_POST);
        }

    ?>

    <section class="loginpage text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <div class="login-user">
              <a href="/"><img src="img/logo.png" class="img-fluid" alt=""></a>
              <h2>Login</h2>
              <h5>Sign in to your account</h5>
              <div style="margin: 20px; text-align: center">
                  <span style="font-weight: 600; text-transform:uppercase; font-size: 14px;">

                      <?php

                          if(isset($customerlogin)){
                              echo $customerlogin;
                          }

                      ?>
                  </span>
              </div>
              <form class="form" action="" method="post">
                <input type="text" class="form-control" name="user_email" value="" placeholder="Email">
                <input type="password" class="form-control" name="user_pass" value="" placeholder="Password">
                <button type="submit" class="form-control" name="login">Login</button>
              </form>
              <span style="font-size: 18px;"><a href="/forgot-password">Forgot password?</a></span><br><br>
              <span style="font-size: 18px;">Don't have an account?<a href="/register"> Register</a></span><br><br>
            </div>
          </div>
        </div>
      </div>
    </section>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
