<?php include "../classes/Adminlogin.php"; ?>

<?php

  $adminlogin = new Adminlogin();
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);

    $logincheck = $adminlogin->adminLogin($adminUser,$adminPass);
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/layout.css">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
</head>
<body>
<div class="login-page">
  <div class="form">
    <span class="text-danger" style="font-weight: 700";>
      <?php

        if(isset($logincheck)){
          echo $logincheck;
        }

      ?>
    </span>
    <h2>Admin Login</h2><hr>
    <form action="" method="post" class="login-form">
      <input type="text" name="adminUser" placeholder="Username"/>
      <input type="password" name="adminPass" placeholder="Password"/>
      <button type="submit" name="admin_login">login</button>
    </form>
  </div>
</div>
</body>
</html>
