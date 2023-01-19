<?php

include "../lib/Session.php";
Session::checkSession();

include '../lib/Database.php';
include_once "../format/helper.php";
require 'mail.php';

$db = new Database();
$format = new Format();

require_once '../classes/User.php';
$user = new User();

?>

<?php

  include '../classes/Admin.php';

  $admin = new Admin();

  $id = Session::get("UserId");
  $getUsers = $admin->getUserById($id);

  if($getUsers){

    while($result = $getUsers->fetch_assoc()){
      $user_unique_id = $result['user_unique_id'];
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Musknft Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../img/logo.png" />

  <style>
    .pop{
        width: auto;
        height: 100%;
        padding: 15px 25px;
        position: relative;
        left: 200px;
        top: -380px;
        bottom: 0;
        background: #16638f;
        display: block;
        z-index: 99;
        border-radius: 10px;
        color: #fff;
    }
    
    
    

    @media only screen and (min-width: 599px) and (max-width: 767px) {
        .pop{
            top: -600px;
            left: 300px;
            padding: 10px 15px;
        }
    }
    

    @media (min-width: 576px) and (max-width: 767px) {
        .pop{
            top: -600px;
            left: 300px;
            padding: 10px 15px;
        }
    }
    
    @media only screen and (max-width: 480px) {
        .pop{
            top: -745px;
            left: 180px;
            padding: 10px 15px;
        }
    }

    @media only screen and (max-width: 425px) {
        .pop{
            top: -745px;
            left: 180px;
            padding: 10px 15px;
        }
    }

    @media only screen and (max-width: 375px) {

        .pop{
            top: -710px;
            left: 140px;
            padding: 10px 15px;
        }

    @media only screen and (max-width: 320px) {

        .pop{
            top: -820px;
            left: 90px;
            padding: 10px 15px;
        }   

    }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    var myVar; 
    var texts = new Array();
    texts.push("Emmanuel received $200");
    texts.push("John received $200");
    texts.push("Maryann received $200");
    var point = 0;
    
    
    function showImage(){
        $(".pop").html(texts[point]).fadeIn(1000).fadeOut(2000);
        myVar = setTimeout(showImage, 3000);
        if(point < ( texts.length - 1 ) ){
            point++;
          }else{
            point = 0;
          }
    }
    function stopFunction(){
        clearTimeout(myVar); // stop the timer
    }
    $(document).ready(function(){
        showImage();
    });
  </script>

  <style>
    .i a{
      text-decoration: none;
      color: #222;
    }
    .i i{
      font-size: 40px;
      color: #4099FF;
    }
     {
      display: flex;
      flex-direction: row;
      height: auto;
      width: 100%;
      align-items: center;
      justify-content: center;
      margin: auto;
    }
     #inviteCode.invite-page {
      box-sizing: border-box;
      display: flex;
      flex-direction: row;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      justify-content: space-between;
      width: 100%;
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.07);
    }
     #inviteCode.invite-page #link,#link2,#link3,#link4,#link5,#link6 {
      align-self: center;
      font-size: 1.2em;
      color: #333;
      font-weight: bold;
      flex-grow: 2;
      background-color: #fff;
      border: none;
    }
     #inviteCode.invite-page #copy {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy2 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy2 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy2 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy2 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy2:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy3 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy3 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy3 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy3 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy3:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy4 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy4 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy4 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy4 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy4:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

     #inviteCode.invite-page #copy5 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy5 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy5 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy5 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy5:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

     #inviteCode.invite-page #copy6 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy6 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy6 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy6 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy6:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

    @-webkit-keyframes showcopied {
      0% {
        opacity: 0;
        transform: translateX(100%);
    }
    70% {
      opacity: 1;
      transform: translateX(0);
    }
    100% {
      opacity: 0;
    }
    }

    @keyframes showcopied {
    0% {
      opacity: 0;
      transform: translateX(100%);
    }
    70% {
      opacity: 1;
      transform: translateX(0);
    }
    100% {
      opacity: 0;
    }
    }

    .amount{
      padding: 0;
      margin: 0;
    }
    .amount h4{
      padding: 30px 0 5px 0;
      font-size: 35px;
    }
    .aa{
      margin: 0 30px !important;
      padding: 0 !important;
    }
    .aa li{
      padding: 0 10px 0 0px !important;
      list-style: none !important;
      display: inline-block;
    }
    .aa li a{
      color: #555;
    }
    .i i:hover{
      cursor: pointer;
    }
    
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="/dashboard/home">
            <img src="../img/logo.png" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">  <?php
                        /* This sets the $time variable to the current hour in the 24 hour clock format */
                        $time = date("H");
                        /* Set the $timezone variable to become the current timezone */
                        $timezone = date("e");
                        /* If the time is less than 1200 hours, show good morning */
                        if ($time < "12") {
                            echo "Good Morning";
                        } else
                        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                        if ($time >= "12" && $time < "17") {
                            echo "Good Afternoon";
                        } else
                        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                        if ($time >= "17" && $time < "19") {
                            echo "Good Evening";
                        } else
                        /* Finally, show good night if the time is greater than or equal to 1900 hours */
                        if ($time >= "19") {
                            echo "Good Night";
                        }
                        ?>, 
            <span class="text-black fw-bold"><?php echo Session::get("UserFullname"); ?></span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <!-- <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li> -->
          <?php

            $getUsers = $admin->getUserById($id);

            if($getUsers){

              while($result = $getUsers->fetch_assoc()){
                $username = $result['username'];
                $user_email = $result['user_email'];
                $user_wallet_id = $result['user_wallet_id'];
                $user_country = $result['user_country'];
                $user_image = $result['user_image'];

              }
            }

            if(empty($user_image)){

                $user_image = "/dashboard/images/faces/face88.jpg";

            }else if(!file_exists($user_image)){

                $user_image = "/dashboard/images/faces/face88.jpg";
            }

          ?>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?php echo $user_image; ?>" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?php echo $user_image; ?>" width="50" height="50" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo Session::get("UserFullname"); ?></p>
                <p class="fw-light text-muted mb-0"><?php echo Session::get("UserEmail"); ?></p>
              </div>
              <a href="/dashboard/logout" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <?php  

        $AdminVerify = Session::get("AdminVerify");

        if ($AdminVerify == 0): ?>

          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/home">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basics">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i> 
              </a>
              <div class="collapse" id="ui-basics">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/dashboard/change-password">Change Password</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/dashboard/logout">Logout</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item nav-category">Social Media</li>
            <ul class="aa">
              <li class="nav-item"> <a href="https://twitter.com/NftmuskOfficial" target="_blank"><i style="font-size: 20px !important;" class="mdi mdi-twitter"></i></a></li>
              <li class="nav-item"> <a href="https://t.me/NftmuskOfficial" target="_blank"><i style="font-size: 20px !important;" class="mdi mdi-telegram"></i></a></li>
          </ul>

        <?php endif; ?>

        <?php  

        $AdminVerify = Session::get("AdminVerify");

        if ($AdminVerify == 1): ?>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/home">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/deposit">
              <span class="menu-title">Deposit</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/withdraw">
              <span class="menu-title">Withdraw</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/upload">
              <span class="menu-title">Upload NFT</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/collection" target="_blank">
              <span class="menu-title">Buy NFT</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/dashboard/notify-us"> 
              <span class="menu-title">Notify Us</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/referral?id=<?php echo $user_unique_id; ?>">
              <span class="menu-title">Referral Link</span>
            </a>
          </li>
          <li class="nav-item nav-category">Profile</li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/view-profile">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">View Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/update-profile" >
              <i class="menu-icon mdi mdi-account-settings"></i>
              <span class="menu-title">Update Profile</span>
            </a>
          </li>
          <li class="nav-item nav-category">Settings</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basics">
              <i class="mdi mdi-cogs menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basics">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/dashboard/change-password">Change Password</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/dashboard/logout">Logout</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Social Media</li>
          <ul class="aa">
            <li class="nav-item"> <a href="https://twitter.com/NftmuskOfficial" target="_blank"><i style="font-size: 20px !important;" class="mdi mdi-twitter"></i></a></li>
            <li class="nav-item"> <a href="https://t.me/NftmuskOfficial" target="_blank"><i style="font-size: 20px !important;" class="mdi mdi-telegram"></i></a></li>
          </ul>
            
          
          
        </ul>
        <?php endif; ?>
      </nav>