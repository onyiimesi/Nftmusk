<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
require_once 'classes/User.php';

$db = new Database();
$user = new User();


?>
<?php 
  
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verify'])){

     $userreg = $user->userVerify($_POST);
 }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <title>EUFXP - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>



    <section class="loginpage text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <div class="login-user">
              <a href="/"><img src="img/logo.png" class="img-fluid" alt=""></a>
              <h2>Verify Your Account</h2>
              <?php

                if(isset($userreg)){
                    echo $userreg;
                }

              ?>
              <?php  
                
                if (isset($_SESSION["message"])) {

                  echo $_SESSION['message'];
                    
                }
              ?>
              <form class="form" action="" method="post">
                <input type="text" class="form-control" name="otp_code" placeholder="Enter OTP Code">
                <button type="submit" class="form-control" name="verify">Verify</button>
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
