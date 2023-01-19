<?php ob_start(); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>


<?php

$_SESSION['user_email'] = null;
$_SESSION['user_name'] = null;

header("Location: /admin/login.php");

?>
