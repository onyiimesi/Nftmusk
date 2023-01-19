<?php
include "lib/Session.php";
Session::init();

include 'lib/Database.php';
include 'classes/User.php';

$db = new Database();
$user = new User();

?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <title>NFTMUSK - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<?php

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']){

            $resettoken = $user->passwordReset($_POST);
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

			              <h3>Reset Password</h3>
							<?php

							if($_GET['key'] && $_GET['token'])
							{

							$email = $_GET['key'];
							$token = $_GET['token'];

							$query = "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `user_email`='".$email."';";
							$result = $db->select($query);

							$curDate = date("Y-m-d H:i:s");

							if ($result !== false && $result->num_rows > 0) {

								$row = $result->fetch_assoc();

								if($row['exp_date'] >= $curDate){ ?>

									<form action="" method="post">
										<input type="hidden" name="email" value="<?php echo $email;?>">
										<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
										<div class="form-group mb-3">
										<label for="exampleInputEmail1">Password</label>
										<input type="password" name='password' class="form-control">
										</div>                
										<div class="form-group mb-3">
										<label for="exampleInputEmail1">Confirm Password</label>
										<input type="password" name='cpassword' class="form-control">
										</div>
										<input type="submit" name="new-password" class="btn btn-primary">
									</form>
						</div>
					</div>
				</div>
			</div>
			<?php } }  
			}
			?>
			</div>
		</div>
	</div>
</body>
</html>